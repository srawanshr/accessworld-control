<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\VpsOrder;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVpsOrder;

class VpsOrderController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('order.vps.index');
    }

    /**
     * @return mixed
     */
    public function vpsOrderList()
    {
        $orders = VpsOrder::with('order.customer', 'order.created_by', 'order.approved_by')->latest()->get();

        return Datatables::of($orders)->make(true);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function details(Request $request)
    {
        $vpsOrder = VpsOrder::find($request->get('id'));

        return view('order.vps.details', compact('vpsOrder'))->render();
    }

    /**
     * @param UpdateVpsOrder $request
     * @param VpsOrder $vpsOrder
     * @return mixed
     */
    public function update(UpdateVpsOrder $request, VpsOrder $vpsOrder)
    {
        $request->updateVpsOrder($vpsOrder);

        return back()->withSuccess(trans('messages.update_success', ['entity' => 'VPS order']));
    }
}
