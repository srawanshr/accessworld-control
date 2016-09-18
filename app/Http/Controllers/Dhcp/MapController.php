<?php

namespace App\Http\Controllers\Dhcp;

use App\Http\Requests\StoreDhcpMap;
use App\Http\Requests\UpdateDhcpMap;
use DB;
use Datatables;
use App\Models\Ip;
use App\Models\Dhcp\Map;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $ips = Ip::used(false)->pluck('ip', 'ip');

        return view('dhcp.map.index', compact('ips'));
    }

    /**
     * @param StoreDhcpMap $request
     * @return mixed
     */
    public function store(StoreDhcpMap $request)
    {
        Map::create($request->data());

        return back()->withSuccess(trans('messages.create_success', ['entity' => 'DHCP IP record']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $map = Map::where('ip', $request->get('ip'))->first();

        return view('dhcp.map.edit', compact('map'));
    }

    /**
     * @param Map $map
     * @param UpdateDhcpMap $request
     * @return mixed
     */
    public function update(Map $map, UpdateDhcpMap $request)
    {
        $map->update($request->all());

        return back()->withSuccess(trans('messages.update_success', ['entity' => 'DHCP IP']));
    }

    /**
     * @return mixed
     */
    public function mapList()
    {
        return Datatables::eloquent(Map::select(['ip', 'mac', 'subnet', 'hostname', 'serial']))
            ->addColumn('action', function ($map)
            {
                $buttons = '<a role="button" href="javascript:void(0);" class="text-primary item-delete" data-url="' . route('dhcp.map.destroy', $map->mac) . '">Delete</a>';

                return $buttons;
            })->make(true);
    }

    /**
     * @param Map $map
     * @return mixed
     */
    public function destroy(Map $map)
    {
        DB::transaction(function () use ($map)
        {
            $ip = Ip::where('ip', $map->ip)->first();

            if ($ip)
                $ip->update(['is_used' => false, 'mac' => null, 'hostname' => null]);

            Map::where('ip', $map->ip)->first()->delete();
        });

        return response()->json([
            'Result' => 'OK'
        ]);
    }
}
