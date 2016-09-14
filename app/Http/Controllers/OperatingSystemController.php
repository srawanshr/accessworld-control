<?php

namespace App\Http\Controllers;

use DB;
use App\Models\OperatingSystem;
use App\Http\Requests\StoreOperatingSystem;
use App\Http\Requests\UpdateOperatingSystem;

class OperatingSystemController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $operatingSystems = OperatingSystem::all();

        return view('operatingSystem.index', compact('operatingSystems'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('operatingSystem.create');
    }

    /**
     * @param StoreOperatingSystem $request
     * @return mixed
     */
    public function store(StoreOperatingSystem $request)
    {
        DB::transaction(function () use ($request)
        {
            $operatingSystem = OperatingSystem::create($request->data());

            $this->uploadRequestImage($request, $operatingSystem);
        });

        return redirect()->route('operatingSystem.index')->withSuccess(trans('messages.create_success', ['entity' => 'Operating System']));
    }

    /**
     * @param OperatingSystem $operatingSystem
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(OperatingSystem $operatingSystem)
    {
        return view('operatingSystem.edit', compact('operatingSystem'));
    }

    /**
     * @param UpdateOperatingSystem $request
     * @param OperatingSystem $operatingSystem
     * @return mixed
     */
    public function update(UpdateOperatingSystem $request, OperatingSystem $operatingSystem)
    {
        DB::transaction(function () use ($request, $operatingSystem)
        {
            $operatingSystem->update($request->data());

            $this->uploadRequestImage($request, $operatingSystem);
        });

        return redirect()->route('operatingSystem.index')->withSuccess(trans('messages.update_success', ['entity' => 'Operating System']));
    }

    /**
     * @param OperatingSystem $operatingSystem
     * @return mixed
     */
    public function destroy(OperatingSystem $operatingSystem)
    {
        $operatingSystem->delete();

        return back()->withSuccess(trans('messages.create_success', ['entity' => 'Operating System']));
    }
}
