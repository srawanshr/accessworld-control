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
        return Datatables::of(EmailOrder::with('order.customer', 'order.created_by', 'order.approved_by')->provisioned(false)->latest()->get())->make(true);
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
