<?php

namespace App\Http\Controllers;

use DB;
use Datatables;
use App\Models\WebOrder;
use App\Models\WebProvision;
use App\Http\Requests\StoreWebProvision;
use App\Http\Requests\UpdateWebProvision;

use App\Http\Requests;
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
        if ($webOrder->provision)
            return redirect()->route('provision.vps.edit', $webOrder->provision->id)->withInfo('Already Provisioned');

        return view('provision.web.create', compact('webOrder'));
    }

    /**
     * @param WebOrder $webOrder
     * @param StoreWebProvision $request
     * @return mixed
     */
    public function store(WebOrder $webOrder, StoreWebProvision $request)
    {
        DB::transaction(function () use($webOrder, $request){
            WebProvision::create($request->data());

            $webOrder->update(['is_provisioned'=>true]);
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
}
