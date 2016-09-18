<?php

namespace App\Http\Controllers;

use DB;
use Datatables;
use App\Models\VpsOrder;
use Illuminate\Http\Request;
use App\Models\VpsProvision;
use App\Http\Requests\StoreVpsProvision;
use App\Http\Requests\UpdateVpsProvision;

use App\Http\Requests;

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
        DB::transaction(function () use($request, $vpsOrder){
            VpsProvision::create($request->data());

            $vpsOrder->update(['is_provisioned'=>true]);
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
        $provisions = VpsProvision::with('customer', 'operatingSystem', 'provisionedBy')->latest()->select([
            'id',
            'customer_id',
            'operating_system_id',
            'provisioned_by',
            'virtual_machine',
            'ip',
            'mac'
        ]);
        return Datatables::eloquent($provisions)->addColumn('operating_system', function ($item)
        {
            return $item->operatingSystem->name;
        })->addColumn('provisioned_by', function ($item)
        {
            return $item->provisionedBy->name;
        })->make(true);
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
}
