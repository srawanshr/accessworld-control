<?php

namespace App\Http\Controllers;

use DB;
use App\Models\OperatingSystem;
use App\Http\Requests\StoreOperatingSystem;
use App\Http\Requests\UpdateOperatingSystem;

use Illuminate\Http\Request;
use App\Http\Requests;

class OperatingSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operatingSystems = OperatingSystem::all();

        return view('operatingSystem.index', compact('operatingSystems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operatingSystem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OperatingSystemRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperatingSystem $request)
    {
        DB::transaction(function () use ($request)
        {
            $operatingSystem = OperatingSystem::create($request->data());

            $this->uploadRequestImage($request, $operatingSystem);
        });

        return redirect()->route('operatingSystem.index')->withSuccess('Operating system created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  OperatingSystem $os
     * @return \Illuminate\Http\Response
     */
    public function edit(OperatingSystem $operatingSystem)
    {
        return view('operatingSystem.edit', compact('operatingSystem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OperatingSystem $os
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperatingSystem $request, OperatingSystem $operatingSystem)
    {
        DB::transaction(function () use ($request, $operatingSystem)
        {
            $operatingSystem->update($request->data());

            $this->uploadRequestImage($request, $operatingSystem);
        });

        return redirect()->route('operatingSystem.index')->withSuccess('Operating system updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  OperatingSystem $os
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperatingSystem $operatingSystem)
    {
        return redirect()->back()->withSuccess('Operating system deleted!');
    }
}
