<?php

namespace App\Http\Controllers;

use App\Models\VpsOrder;
use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Datatables;

class VpsProvisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('provision.vps.index');
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
}
