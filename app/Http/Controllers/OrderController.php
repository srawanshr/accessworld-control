<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Service;
use Datatables;
use DB;
use Form;
use Illuminate\Http\Request;

class OrderController extends Controller
{

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
        $services = Service::orderBy('order')->limit(3)->pluck('name', 'slug');

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

            if ($request->has('vps')) $request->createVpsOrder($order);

            if ($request->has('web')) $request->createWebOrder($order);

            if ($request->has('email')) $request->createEmailOrder($order);
        });

        return redirect()->route('order.index')->withSuccess(trans('messages.create_success', [ 'entity' => 'Order' ]));
    }

    public function edit(Order $order)
    {
        $customers = Customer::all()->pluck('name', 'id');

        return view('order.edit', compact('order', 'customers'));
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

    /**
     * @param UpdateOrder $request
     * @param Order $order
     * @return mixed
     */
    public function update(UpdateOrder $request, Order $order)
    {
        DB::transaction(function () use ($request, $order)
        {
            $request->updateOrder($order);

            if ($request->has('vps')) $request->updateVpsOrder();

            if ($request->has('web')) $request->updateWebOrder();

            if ($request->has('email')) $request->updateEmailOrder();
        });

        return back()->withSuccess(trans('messages.update_success', [ 'entity' => 'Order' ]));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function orderList(Request $request)
    {
        return Datatables::eloquent(Order::with([
            'customer'    => function ($q)
            {
                $q->select('id', 'first_name', 'last_name');
            },
            'created_by'  => function ($q)
            {
                $q->select('id', 'username');
            },
            'approved_by' => function ($q)
            {
                $q->select('id', 'username');
            }
        ])->latest()->select('id', 'customer_id', 'created_by', 'approved_by', 'date'))->addColumn('action', function ($item)
        {
            $button = false;
            if (auth()->user()->canOne([ 'save.order', 'delete.order' ]))
            {
                if (auth()->user()->can('save.order')) $button .= '<a href="' . route('order.edit', $item->id) . '" class="btn-primary btn btn-flat">Edit</a>';
            }
            else
            {
                $button = "NA";
            }

            return $button;
        })->make(true);
    }

    /**
     * @param Order $order
     */
    public function approve(Order $order)
    {
        if($order->customer->getBalance() >= $order->total)
        {
            $order->update([ 'approved_by' => auth()->id() ]);

            return back()->withSuccess('Order Approved');
        }

        return back()->withWarning('Cannot Approve the order. Please verify the customer has enough balance!');
    }

    /**
     * @param Order $order
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return back()->withSuccess('Order Rejected');
    }
}
