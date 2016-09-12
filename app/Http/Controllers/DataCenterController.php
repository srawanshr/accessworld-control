<?php

namespace App\Http\Controllers;

use DB;
use App\Models\DataCenter;
use App\Http\Requests\StoreDataCenter;
use App\Http\Requests\UpdateDataCenter;

use Illuminate\Http\Request;
use App\Http\Requests;

class DataCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataCenters = DataCenter::all();

        return view('dataCenter.index', compact('dataCenters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dataCenter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataCenter $request)
    {
        DB::transaction(function () use ($request)
        {
            $dataCenter = DataCenter::create($request->data());

            $this->uploadRequestImage($request, $dataCenter);
        });

        return redirect()->route('dataCenter.index')->withSuccess('Data center created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  DataCenter $dataCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(DataCenter $dataCenter)
    {
        return view('dataCenter.edit', compact('dataCenter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param DataCenter $dataCenter
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(UpdateDataCenter $request, DataCenter $dataCenter)
    {
        DB::transaction(function () use ($request, $dataCenter)
        {
            $dataCenter->update($request->data());

            $this->uploadRequestImage($request, $dataCenter);
        });

        return redirect()->route('dataCenter.index')->withSuccess('Data center updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DataCenter $dataCenter
     * @return \Illuminate\Http\Response
     * @internal param $id
     * @internal param DataCenter $dataCenter
     */
    public function destroy(DataCenter $dataCenter)
    {
        return redirect()->back()->withSuccess('Data center deleted!');
    }
}
