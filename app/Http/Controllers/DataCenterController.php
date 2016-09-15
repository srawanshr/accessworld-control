<?php

namespace App\Http\Controllers;

use DB;
use App\Models\DataCenter;
use App\Http\Requests\StoreDataCenter;
use App\Http\Requests\UpdateDataCenter;

use Illuminate\Http\Request;
use App\Http\Requests;

class DataCenterController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $dataCenters = DataCenter::all();

        return view('dataCenter.index', compact('dataCenters'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('dataCenter.create');
    }

    /**
     * @param StoreDataCenter $request
     * @return mixed
     */
    public function store(StoreDataCenter $request)
    {
        DB::transaction(function () use ($request)
        {
            $dataCenter = DataCenter::create($request->data());

            $this->uploadRequestImage($request, $dataCenter);
        });

        return redirect()->route('dataCenter.index')->withSuccess(trans('messages.create_success', ['entity' => 'Data Center']));
    }

    /**
     * @param DataCenter $dataCenter
     * @return \Illuminate\View\View
     */
    public function edit(DataCenter $dataCenter)
    {
        return view('dataCenter.edit', compact('dataCenter'));
    }

    /**
     * @param UpdateDataCenter $request
     * @param DataCenter $dataCenter
     * @return mixed
     */
    public function update(UpdateDataCenter $request, DataCenter $dataCenter)
    {
        DB::transaction(function () use ($request, $dataCenter)
        {
            $dataCenter->update($request->data());

            $this->uploadRequestImage($request, $dataCenter);
        });

        return redirect()->route('dataCenter.index')->withSuccess(trans('messages.update_success', ['entity' => 'Data Center']));
    }

    /**
     * @param DataCenter $dataCenter
     * @return mixed
     */
    public function destroy(DataCenter $dataCenter)
    {
        $dataCenter->delete();

        return back()->withSuccess(trans('messages.delete_success', ['entity' => 'Data Center']));
    }
}
