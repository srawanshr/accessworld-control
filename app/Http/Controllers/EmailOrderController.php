<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmailOrder;
use Datatables;
use App\Models\EmailOrder;
use Illuminate\Http\Request;

class EmailOrderController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('order.email.index');
    }

    /**
     * @return mixed
     */
    public function emailOrderList()
    {
        $orders = EmailOrder::with('order')->latest()->select([
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
        $emailOrder = EmailOrder::find($request->get('id'));

        return view('order.email.details', compact('emailOrder'))->render();
    }

    /**
     * @param UpdateEmailOrder $request
     * @param EmailOrder $emailOrder
     * @return mixed
     */
    public function update(UpdateEmailOrder $request, EmailOrder $emailOrder)
    {
        $request->updateOrder($emailOrder);

        return back()->withSuccess(trans('messages.update_success', ['entity' => 'Email order']));
    }
}
