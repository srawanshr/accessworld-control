<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeVpsProvision;
use App\Http\Requests\RenewVpsProvision;
use App\Http\Requests\StoreVpsProvision;
use App\Http\Requests\UpdateVpsProvision;
use App\Models\DataCenter;
use App\Models\Dhcp\Map;
use App\Models\Ip;
use App\Models\ManualPayment;
use App\Models\Order;
use App\Models\VpsOrder;
use App\Models\VpsProvision;
use App\Notifications\VpsProvisioned;
use App\Services\XenService;
use Carbon\Carbon;
use Datatables;
use DB;
use Exception;
use Illuminate\Http\Request;
use Mail;
use phpseclib\Net\SSH2;

class VpsProvisionController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('provision.vps.index');
    }

    /**
     * @param VpsOrder $vpsOrder
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(VpsOrder $vpsOrder)
    {
        if ($vpsOrder->provision) return redirect()->route('provision.vps.edit', $vpsOrder->provision->id)->withInfo('Already provisioned!');

        return view('provision.vps.create', compact('vpsOrder'));
    }

    /**
     * @param StoreVpsProvision $request
     * @param VpsOrder $vpsOrder
     * @return mixed
     */
    public function store(StoreVpsProvision $request, VpsOrder $vpsOrder)
    {
        DB::transaction(function () use ($request, $vpsOrder)
        {
            VpsProvision::create($request->data());

            $vpsOrder->update([ 'is_provisioned' => true ]);
        });

        return redirect()->route('provision.vps.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'VPS Provision' ]));
    }

    /**
     * @param VpsProvision $vpsProvision
     * @return \Illuminate\View\View
     */
    public function edit(VpsProvision $vpsProvision)
    {
        return view('provision.vps.edit', compact('vpsProvision'));
    }

    /**
     * @param UpdateVpsProvision $request
     * @param VpsProvision $vpsProvision
     * @return mixed
     */
    public function update(UpdateVpsProvision $request, VpsProvision $vpsProvision)
    {
        $vpsProvision->update($request->data());

        return back()->withSuccess(trans('messages.update_success', [ 'entity' => 'VPS Provision' ]));
    }

    /**
     * @return mixed
     */
    public function vpsProvisionList()
    {
        return Datatables::of(VpsProvision::with('customer', 'operatingSystem', 'provisionedBy')->latest()->get())->make(true);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function details(Request $request)
    {
        $vpsProvision = VpsProvision::find($request->get('id'));

        return view('provision.vps.partials.form-edit', compact('vpsProvision'))->render();
    }

    /**
     * @param VpsProvision $vpsProvision
     * @return mixed
     */
    public function destroy(VpsProvision $vpsProvision)
    {
        $vpsProvision->delete();

        return back()->withSuccess(trans('messages.delete_success', [ 'entity' => 'Vps Provision' ]));
    }

    /**
     * @param VpsProvision $vpsProvision
     * @return \Illuminate\View\View
     */
    public function renew(VpsProvision $vpsProvision)
    {
        return view('provision.vps.renew', compact('vpsProvision'));
    }

    /**
     * @param VpsProvision $vpsProvision
     * @param RenewVpsProvision $request
     * @return mixed
     */
    public function extend(VpsProvision $vpsProvision, RenewVpsProvision $request)
    {
        DB::transaction(function () use ($vpsProvision, $request)
        {
            $expiry = Carbon::createFromFormat('Y-m-d', $request->get('date'))->addMonths($request->get('term'))->format('Y-m-d');

            $payment = ManualPayment::create([
                'user_id' => auth()->id()
            ]);

            $order = Order::create([
                'customer_id' => $vpsProvision->customer_id,
                'slug'        => str_slug(date('Ymd His') . '-' . $vpsProvision->customer_id),
                'date'        => date('Y-m-d'),
                'created_by'  => auth()->id(),
                'approved_by' => auth()->id(),
                'status'      => 'approved',
            ]);

            $order->vpsRenewals()->create([
                'provisioned_by'   => auth()->id(),
                'term'             => $request->get('term'),
                'vps_provision_id' => $vpsProvision->id,
                'price'            => $request->get('total'),
                'discount'         => $request->get('discount'),
                'start_date'       => $request->get('date'),
                'expiry_date'      => $expiry
            ]);

            $payment->invoice()->create([
                'order_id'    => $order->id,
                'customer_id' => $vpsProvision->customer_id,
                'sub_total'   => $request->get('sub_total'),
                'discount'    => $request->get('discount'),
                'vat'         => $request->get('vat'),
                'total'       => $request->get('total')
            ]);

            $vpsProvision->update([ 'expiry_date' => $expiry ]);

        });

        return redirect()->back()->withSuccess(trans('messages.renew_success', [ 'entity' => 'VPS Provision' ]));
    }

    /**
     * @param VpsOrder $vpsOrder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function make(VpsOrder $vpsOrder)
    {
        if ($vpsOrder->provision) return redirect()->route('provision.vps.edit', $vpsOrder->provision->id)->withInfo('Already provisioned!');

        return view('provision.vps.make', compact('vpsOrder'));
    }

    /**
     * @param VpsOrder $order
     * @param MakeVpsProvision $request
     */
    public function provision(VpsOrder $order, MakeVpsProvision $request)
    {
        $provision = DB::transaction(function () use ($request, $order)
        {
            $xen        = new XenService();
            $connection = $request->get('vm');

            if ($xen->connect($connection))
            {
                if ($vps = $xen->provision($request->data()))
                {
                    $order->update([ 'is_provisioned' => 1 ]);

                    $ip = Ip::whereIp($vps['ip'])->first();

                    $ip->update([
                        'is_used'  => 1,
                        'mac'      => $vps['mac'],
                        'hostname' => $vps['name']
                    ]);

                    Map::create([
                        'mac'      => $vps['mac'],
                        'ip'       => $vps['ip'],
                        'hostname' => $vps['name'],
                        'subnet'   => $ip->subnet->subnet,
                        'serial'   => explode('.', $vps['ip'])[2]
                    ]);

                    $expiry = Carbon::createFromFormat('Y-m-d', $request->get('created_at'))->addMonths($request->get('term'))->format('Y-m-d');

                    $provision = VpsProvision::create([
                        'name'                => $request->input('name'),
                        'customer_id'         => $order->order->customer_id,
                        'vps_order_id'        => $order->id,
                        'operating_system_id' => $order->operating_system_id,
                        'data_center_id'      => $request->input('data_center_id'),
                        'server_id'           => $vps['server_id'],
                        'virtual_machine'     => $connection,
                        'uuid'                => $vps['uuid'],
                        'cpu'                 => $request->input('cpu'),
                        'ram'                 => $request->input('ram'),
                        'disk'                => $request->input('disk'),
                        'traffic'             => $request->input('traffic'),
                        'ip'                  => $vps['ip'],
                        'mac'                 => $vps['mac'],
                        'password'            => '',
                        'is_trial'            => $request->input('is_trial', false),
                        'is_managed'          => $request->input('is_managed', false),
                        'is_suspended'        => false,
                        'vdi_uuid'            => $vps['vdi_uuid'],
                        'provisioned_by'      => auth()->id(),
                        'expiry_date'         => $expiry,
                        'created_at'          => $request->get('created_at')
                    ]);

                    Mail::to($order->customer())->send(new \App\Mail\VpsProvisioned($provision));

                    return $provision;
                }
            }

            return false;

        });

        if ($provision) return back()->withSuccess('VPS Provisioned!');
        else
            return back()->withWarning('Something went wrong!');
    }

    /**
     * @param Request $request
     * @return array
     * @throws Exception
     */
    public function getOperatingSystems(Request $request)
    {
        $vm = $request->get('vm');
        if (is_null(config('xenapi.' . $vm))) throw new Exception('Invalid VM');
        $vm  = config('xenapi.' . $vm);
        $ssh = new SSH2($vm['URL']);
        if ( ! $ssh->login($vm['USER'], $vm['PASSWORD'])) throw new Exception('Authentication Failed');

        $output = collect(preg_split("/\s+/", str_replace([ " ", "(RO)", "(RW)" ], [
            "",
            "",
            ""
        ], $ssh->exec('xe template-list name-description=AWT'))));

        $templates = [];

        $count = 0;
        foreach ($output->chunk(3) as $group)
        {
            foreach ($group as $template)
            {
                $data = explode(':', $template);
                if (count($data) == 2) $templates[ $count ][ strtolower($data[0]) ] = $data[1];
            }
            $count ++;
        }

        return $templates;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function getServerId(Request $request)
    {
        $datacenter_id = $request->get('datacenter');
        $type          = $request->get('type', 1);

        $location = DataCenter::findOrFail($datacenter_id)->prefix;

        //determine the last server_id
        $raw_server_id = VpsProvision::where('server_id', 'LIKE', $location . $type . '%')->orderBy('server_id', 'desc')->first();

        $latest_server_id = $raw_server_id == null ? '0' : $raw_server_id->server_id;

        $latest_server_sn = intval(substr($latest_server_id, 2));

        $server_id = $location . ( ( intval($type) * 1000 ) + $latest_server_sn + 1 ); //new server id obtained by last sn incremented by 1

        return $server_id;
    }
}
