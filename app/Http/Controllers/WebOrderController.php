<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWebOrder;
use Datatables;
use App\Models\WebOrder;
use Illuminate\Http\Request;

class WebOrderController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('order.web.index');
    }

    /**
     * @return mixed
     */
    public function webOrderList()
    {
        $orders = WebOrder::with('order')->latest()->select([
            'id',
            'order_id',
            'name',
            'term',
            'domain',
            'disk',
            'traffic',
            'price',
            'discount',
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
            return $item->order->approvedBy ? $item->order->approvedBy->name : $item->order->status;
        })->make(true);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function details(Request $request)
    {
        $webOrder = WebOrder::find($request->get('id'));

        return view('order.web.details', compact('webOrder'))->render();
    }

    /**
     * @param UpdateWebOrder $request
     * @param WebOrder $webOrder
     * @return mixed
     */
    public function update(UpdateWebOrder $request, WebOrder $webOrder)
    {
        $request->updateOrder($webOrder);

        return back()->withSuccess(trans('messages.update_success', ['entity' => 'Web order']));
    }
}
