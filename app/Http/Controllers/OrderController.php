<?php

namespace App\Http\Controllers;

use DB;
use Datatables;
use App\Models\Order;
use App\Models\Service;
use App\Models\Customer;
use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;
use Illuminate\Http\Request;

class OrderController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('order.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $services = Service::orderBy('order')->limit(3)->pluck('name', 'id');

        $customers = Customer::all()->pluck('name', 'id');

        return view('order.create', compact('services', 'customers'));
    }

    /**
     * @param StoreOrder $request
     * @return mixed
     */
    public function store(StoreOrder $request)
    {
        DB::transaction(function () use ($request)
        {
            $order = $request->createOrder();

            if ($request->has('vps'))
                $request->createVpsOrder($order);

            if ($request->has('web'))
                $request->createWebOrder($order);

            if ($request->has('email'))
                $request->createEmailOrder($order);
        });

        return redirect()->route('order.index')->withSuccess(trans('messages.create_success', ['entity' => 'Order']));
    }

    /**
     * @param Order $order
     * @return \Illuminate\View\View
     */
    public function edit(Order $order)
    {
        $customers = Customer::all()->pluck('name', 'id');

        return view('order.edit', compact('order', 'customers'));
    }

    public function update(UpdateOrder $request, Order $order)
    {
        DB::transaction(function () use ($request, $order)
        {
            $request->updateOrder($order);

            if ($request->has('vps'))
                $request->updateVpsOrder($order);

            if ($request->has('web'))
                $request->updateWebOrder($order);

            if ($request->has('email'))
                $request->updateEmailOrder($order);
        });

        return back()->withSuccess(trans('messages.update_success', ['entity' => 'Order']));
    }

    public function destroy(Order $order)
    {
        dd($order);
    }

    /**
     * @return mixed
     */
    public function orderList()
    {
        return Datatables::eloquent(Order::with('customer', 'createdBy', 'approvedBy')->select([
            'id',
            'customer_id',
            'date',
            'status',
            'created_by',
            'approved_by'
        ]))->addColumn('action', function ($order)
        {
            $buttons = '<a href="' . route('order.edit', $order->id) . '" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="md md-edit"></i></a>';
            $buttons .= '<button type="button" class="btn btn-icon-toggle btn-delete" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="md md-delete"></i></button>';

            return $buttons;
        })->addColumn('customer', function ($order)
        {
            return $order->customer->name;
        })->editColumn('created_by', function ($order)
        {
            return $order->createdBy->name;
        })->editColumn('approved_by', function ($order)
        {
            return $order->approvedBy ? $order->status == 2 ? 'rejected' : $order->approvedBy->name : 'pending';
        })->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function details(Request $request)
    {
        $order = Order::find($request->get('id'));

        return view('order.partials.details', compact('order'));
    }
}
