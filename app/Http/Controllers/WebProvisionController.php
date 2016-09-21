<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeWebProvision;
use App\Http\Requests\StoreWebProvision;
use App\Http\Requests\UpdateWebProvision;
use App\Models\WebOrder;
use App\Models\WebProvision;
use App\Services\SoapService;
use Datatables;
use DB;
use Illuminate\Http\Request;

class WebProvisionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('provision.web.index');
    }

    /**
     * @param WebOrder $webOrder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(WebOrder $webOrder)
    {
        if ($webOrder->provision) return redirect()->route('provision.web.edit', $webOrder->provision->id)->withInfo('Already Provisioned');

        return view('provision.web.create', compact('webOrder'));
    }

    /**
     * @param WebOrder $webOrder
     * @param StoreWebProvision $request
     * @return mixed
     */
    public function store(WebOrder $webOrder, StoreWebProvision $request)
    {
        DB::transaction(function () use ($webOrder, $request)
        {
            WebProvision::create($request->data());

            $webOrder->update([ 'is_provisioned' => true ]);
        });

        return redirect()->route('provision.web.index')->withSuccess('messages.create_success', [ 'entity' => 'Web Provision' ]);
    }

    /**
     * @param WebProvision $webProvision
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(WebProvision $webProvision)
    {
        return view('provision.web.edit', compact('webProvision'));
    }

    /**
     * @param WebProvision $webProvision
     * @param UpdateWebProvision $request
     * @return mixed
     */
    public function update(WebProvision $webProvision, UpdateWebProvision $request)
    {
        $webProvision->update($request->data());

        return back()->withSuccess(trans('messages.update_success', [ 'entity' => 'Web Provision' ]));
    }

    /**
     * @return mixed
     */
    public function webProvisionList()
    {
        return Datatables::of(WebProvision::with('customer', 'provisionedBy')->latest()->get())->make(true);
    }

    /**
     * @param Request $request
     * @return mixed|null|string
     */
    public function details(Request $request)
    {
        $webProvision = WebProvision::find($request->get('id'));

        return view('provision.web.partials.form-edit', compact('webProvision'))->render();
    }

    /**
     * @param WebProvision $webProvision
     * @return mixed
     */
    public function destroy(WebProvision $webProvision)
    {
        $webProvision->delete();

        return back()->withSuccess(trans('messages.delete_success', [ 'entity' => 'Web Provision' ]));
    }

    /**
     * @param WebOrder $webOrder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function make(WebOrder $webOrder)
    {
        if ($webOrder->provision) return redirect()->route('provision.web.edit', $webOrder->provision->id)->withInfo('Already provisioned!');

        return view('provision.web.make', compact('webOrder'));
    }

    /**
     * @param WebOrder $order
     * @param MakeWebProvision $request
     * @return array
     */
    public function provision(WebOrder $order, MakeWebProvision $request)
    {
        $provision = DB::transaction(function () use ($request, $order)
        {
            $lakuri = new SoapService();
            if ($domain_id = $lakuri->provisionWeb($request->data()))
            {
                $order->is_provisioned = 1;
                $order->save();

                $provision = WebProvision::create([
                    'name'              => $order->name,
                    'customer_id'       => $order->customer->id,
                    'web_order_id'      => $order->id,
                    'provisioned_by'    => auth()->id(),
                    'domain'            => $order->domain,
                    'disk'              => $order->disk,
                    'traffic'           => $order->traffic,
                    'connection_string' => 'LAKURI3',
                    'server_domain_id'  => $domain_id
                ]);

                //                $mailer->sendWebProvisionEmail($provision);
                return $provision;
            }
            $lakuri->disconnect();

            return false;
        });

        if ($provision) return [ 'status' => 'ok'];
        else
            return [ 'status' => 'something went wrong'];
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function checkClient(Request $request)
    {
        $lakuri   = new SoapService();
        $username = $request->get('username', false);
        if ($username)
        {
            $clientExists = $lakuri->clientExists($username);

            if ($clientExists) return 1;

            return 0;
        }
    }
}
