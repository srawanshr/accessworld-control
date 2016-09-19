<?php

namespace App\Http\Controllers;

use DB;
use Datatables;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\VpsOrder;
use App\Models\VpsProvision;
use Illuminate\Http\Request;
use App\Models\ManualPayment;
use App\Http\Requests\RenewVpsProvision;
use App\Http\Requests\StoreVpsProvision;
use App\Http\Requests\UpdateVpsProvision;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function renew(VpsProvision $vpsProvision)
    {
        return view('provision.vps.renew', compact('vpsProvision'));
    }

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

            $vpsProvision->update(['expiry_date' => $expiry]);
            
        });

        return redirect()->back()->withSuccess(trans('messages.renew_success', [ 'entity' => 'VPS Provision' ]));
    }
}
