<?php

namespace App\Http\Controllers;

use DB;
use Datatables;
use App\Models\EmailOrder;
use App\Models\EmailProvision;
use App\Http\Requests\StoreEmailProvision;
use App\Http\Requests\UpdateEmailProvision;

use App\Http\Requests;
use Illuminate\Http\Request;

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
        if ($emailOrder->provision)
            return redirect()->route('provision.vps.edit', $emailOrder->provision->id)->withInfo('Already Provisioned');

        return view('provision.email.create', compact('emailOrder'));
    }

    /**
     * @param EmailOrder $emailOrder
     * @param StoreEmailProvision $request
     * @return mixed
     */
    public function store(EmailOrder $emailOrder, StoreEmailProvision $request)
    {
        DB::transaction(function () use($emailOrder, $request){
            EmailProvision::create($request->data());

            $emailOrder->update(['is_provisioned'=>true]);
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
}
