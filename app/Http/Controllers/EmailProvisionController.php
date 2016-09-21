<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeEmailProvision;
use App\Http\Requests\StoreEmailProvision;
use App\Http\Requests\UpdateEmailProvision;
use App\Mail\EmailProvisioned;
use App\Models\EmailOrder;
use App\Models\EmailProvision;
use App\Services\SoapService;
use Datatables;
use DB;
use Illuminate\Http\Request;
use Mail;

class EmailProvisionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('provision.email.index');
    }

    /**
     * @param EmailOrder $emailOrder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(EmailOrder $emailOrder)
    {
        if ($emailOrder->provision) return redirect()->route('provision.vps.edit', $emailOrder->provision->id)->withInfo('Already Provisioned');

        return view('provision.email.create', compact('emailOrder'));
    }

    /**
     * @param EmailOrder $emailOrder
     * @param StoreEmailProvision $request
     * @return mixed
     */
    public function store(EmailOrder $emailOrder, StoreEmailProvision $request)
    {
        DB::transaction(function () use ($emailOrder, $request)
        {
            EmailProvision::create($request->data());

            $emailOrder->update([ 'is_provisioned' => true ]);
        });

        return redirect()->route('provision.email.index')->withSuccess('messages.create_success', [ 'entity' => 'Email Provision' ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('provision.email.edit', compact('emailProvision'));
    }

    /**
     * @param EmailProvision $emailProvision
     * @param UpdateEmailProvision $request
     * @return mixed
     */
    public function update(EmailProvision $emailProvision, UpdateEmailProvision $request)
    {
        $emailProvision->update($request->data());

        return back()->withSuccess(trans('messages.update_success', [ 'entity' => 'Email Provision' ]));
    }

    /**
     * @return mixed
     */
    public function emailProvisionList()
    {
        return Datatables::of(EmailProvision::with('customer', 'provisionedBy')->latest()->get())->make(true);
    }

    /**
     * @param Request $request
     * @return mixed|null|string
     */
    public function details(Request $request)
    {
        $emailProvision = EmailProvision::find($request->get('id'));

        return view('provision.email.partials.form-edit', compact('emailProvision'))->render();
    }

    /**
     * @param EmailProvision $emailProvision
     * @return mixed
     */
    public function destroy(EmailProvision $emailProvision)
    {
        $emailProvision->delete();

        return back()->withSuccess(trans('messages.delete_success', [ 'entity' => 'Email Provision' ]));
    }

    /**
     * @param EmailOrder $emailOrder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function make(EmailOrder $emailOrder)
    {
        if ($emailOrder->provision) return redirect()->route('provision.email.edit', $emailOrder->provision->id)->withInfo('Already provisioned!');

        return view('provision.email.make', compact('emailOrder'));
    }

    /**
     * @param EmailOrder $order
     * @param MakeEmailProvision $request
     * @return array
     */
    public function provision(EmailOrder $order, MakeEmailProvision $request)
    {
        $provision = DB::transaction(function () use ($request, $order)
        {
            $provision = false;
            $lakuri    = new SoapService();
            if ($domain_id = $lakuri->provisionEmail($request->data()))
            {
                $order->is_provisioned = 1;
                $order->save();

                $provision = EmailProvision::create([
                    'name'              => $order->name,
                    'customer_id'       => $order->customer->id,
                    'email_order_id'    => $order->id,
                    'provisioned_by'    => auth()->id(),
                    'domain'            => $order->domain,
                    'disk'              => $order->disk,
                    'traffic'           => $order->traffic,
                    'connection_string' => 'LAKURI3',
                    'server_domain_id'  => $domain_id
                ]);

                Mail::to($order->customer)->queue(new EmailProvisioned($provision));
            }
            $lakuri->disconnect();

            return $provision;
        });

        if ($provision) return [ 'status' => 'ok' ];
        else
            return [ 'status' => 'something went wrong' ];
    }
}
