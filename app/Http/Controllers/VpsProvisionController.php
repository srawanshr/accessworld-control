<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVpsProvision;
use App\Http\Requests\UpdateVpsProvision;
use App\Models\VpsOrder;
use App\Models\VpsProvision;
use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Datatables;

class VpsProvisionController extends Controller {

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
        if ($vpsOrder->provision)
            return redirect()->route('provision.vps.edit', $vpsOrder->provision->id)->withInfo('Already provisioned!');

        return view('provision.vps.create', compact('vpsOrder'));
    }

    /**
     * @param StoreVpsProvision $request
     * @param VpsOrder $vpsOrder
     * @return mixed
     */
    public function store(StoreVpsProvision $request, VpsOrder $vpsOrder)
    {
        VpsProvision::create($request->data());

        return redirect()->route('provision.vps.index')->withSuccess(trans('messages.create_success', ['entity' => 'VPS Provision']));
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

        return back()->withSuccess(trans('messages.update_success', ['entity' => 'VPS Provision']));
    }

    /**
     * @return mixed
     */
    public function vpsOrderList()
    {
        return;
    }

    /**
     * @param VpsProvision $vpsProvision
     * @return mixed
     */
    public function destroy(VpsProvision $vpsProvision)
    {
        $vpsProvision->delete();

        return back()->withSuccess(trans('messages.delete_success', ['entity' => 'Vps Provision']));
    }
}
