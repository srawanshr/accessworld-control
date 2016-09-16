<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWebProvision;
use App\Models\WebOrder;
use App\Models\WebProvision;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

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

    public function update()
    {

    }

    public function destroy()
    {
    }
}
