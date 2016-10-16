<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\EndpointSecurityOrder;
use App\Http\Requests\UpdateEndpointSecurityOrder;

class EndpointSecurityOrderController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('order.endpointSecurity.index');
    }

    /**
     * @return mixed
     */
    public function endpointSecurityOrderList()
    {
        return Datatables::of(EndpointSecurityOrder::with('order.customer', 'order.created_by', 'order.approved_by')->provisioned(false)->latest()->get())->make(true);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function details(Request $request)
    {
        $endpointSecurityOrder = EndpointSecurityOrder::find($request->get('id'));

        return view('order.endpointSecurity.details', compact('endpointSecurityOrder'))->render();
    }

    /**
     * @param UpdateEndpointSecurityOrder $request
     * @param EndpointSecurityOrder $endpointSecurityOrder
     * @return mixed
     */
    public function update(UpdateEndpointSecurityOrder $request, EndpointSecurityOrder $endpointSecurityOrder)
    {
        $request->updateOrder($endpointSecurityOrder);

        return back()->withSuccess(trans('messages.update_success', ['entity' => 'Endpoint Security order']));
    }
}
