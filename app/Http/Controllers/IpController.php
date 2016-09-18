<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Ip;
use App\Models\Subnet;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateIp;

class IpController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('ip.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $ip = Ip::where('ip', $request->ip)->first();

        $subnets = Subnet::pluck('subnet', 'id')->toArray();

        return view('ip.edit', compact('ip', 'subnets'))->render();
    }

    /**
     * @param UpdateIp $request
     * @param Ip $ip
     * @return mixed
     */
    public function update(UpdateIp $request, Ip $ip)
    {
        $ip->update($request->data());

        return back()->withSuccess(trans('messages.update_success', ['entity' => 'IP']));
    }

    /**
     * @return mixed
     */
    public function ipList()
    {
        return Datatables::eloquent(Ip::select(['ip', 'mac', 'hostname', 'is_used']))
            ->addColumn('used', function ($ip)
            {
                return $ip->is_used ? 'Yes' : 'No';
            })
            ->addColumn('action', function ($ip)
            {
                $buttons = '<a role="button" href="javascript:void(0);" class="text-primary item-delete" data-url="' . route('ip.destroy', $ip->id) . '">Delete</a>';

                return $buttons;
            })->make(true);
    }
}
