<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\WebOrder;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateWebOrder;

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
        return Datatables::of(WebOrder::with('order.customer', 'order.created_by', 'order.approved_by')->latest()->get())->make(true);
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
