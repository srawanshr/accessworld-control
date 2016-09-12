<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateVpsOrder;
use Datatables;
use App\Models\VpsOrder;
use Illuminate\Http\Request;

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
        $orders = VpsOrder::with('order')->latest()->select([
            'id',
            'operating_system_id',
            'order_id',
            'name',
            'term',
            'cpu',
            'ram',
            'disk',
            'traffic',
            'price',
            'is_trial',
            'is_provisioned'
        ]);

        return Datatables::eloquent($orders)->addColumn('customer', function ($item)
        {
            return $item->order->customer->name;
        })->editColumn('created_by', function ($item)
        {
            return $item->order->createdBy->name;
        })->editColumn('approved_by', function ($item)
        {
            return $item->order->approvedBy ? $item->order->status == 2 ? 'rejected' : $item->order->approvedBy->name : 'pending';
        })->make(true);
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
