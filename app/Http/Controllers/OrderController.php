<?php

namespace App\Http\Controllers;

use DB;
use Form;
use Datatables;
use App\Models\Order;
use App\Models\Service;
use App\Models\VpsOrder;
use App\Models\WebOrder;
use App\Models\Customer;
use App\Models\EmailOrder;
use App\Models\DataCenter;
use Illuminate\Http\Request;
use App\Models\OperatingSystem;
use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;

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

            if ($request->has('vps'))
                $request->createVpsOrder($order);

            if ($request->has('web'))
                $request->createWebOrder($order);

            if ($request->has('email'))
                $request->createEmailOrder($order);
        });

        return redirect()->route('order.index')->withSuccess(trans('messages.create_success', ['entity' => 'Order']));
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

            if ($request->has('vps'))
                $request->updateVpsOrder();

            if ($request->has('web'))
                $request->updateWebOrder();

            if ($request->has('email'))
                $request->updateEmailOrder();
        });

        return back()->withSuccess(trans('messages.update_success', ['entity' => 'Order']));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function orderList(Request $request)
    {
        return Datatables::eloquent(Order::with('customer', 'created_by', 'approved_by')->latest()->select())
            ->addColumn('action', function ($item)
            {
                $button = '<a href="' . route('order.edit', $item->id) . '" class="text-primary">Edit</a>';
                $button .= '&nbsp;&nbsp;<a role="button" href="javascript:void(0);" class="text-primary item-delete" data-url="' . route('order.destroy', $item->id) . '">Delete</a>';

                return $button;
            })->make(true);
    }
}
