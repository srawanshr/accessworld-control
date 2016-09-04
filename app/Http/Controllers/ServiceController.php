<?php

namespace App\Http\Controllers;

use Datatables;
use App\Http\Requests;
use App\Models\Service;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreService;
use App\Http\Requests\UpdateService;

class ServiceController extends Controller {

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('service.index', compact('services'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * @param StoreService $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreService $request)
    {
        DB::transaction(function () use ($request)
        {
            $service = Service::create($request->serviceFillData());

            $this->uploadRequestImage($request, $service);
        });

        return redirect()->route('service.index')->withSuccess(trans('messages.create_success', ['entity' => 'Service']));
    }

    /**
     * @param Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('service.edit', compact('service'));
    }

    /**
     * @param UpdateService $request
     * @param Service $service
     * @return mixed
     */
    public function update(UpdateService $request, Service $service)
    {
        DB::transaction(function () use ($request, $service)
        {
            $service->update($request->serviceFillData());

            $this->uploadRequestImage($request, $service);
        });

        return redirect()->back()->withSuccess(trans('messages.update_success', ['entity' => 'Service']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Service $service)
    {
        DB::transaction(function () use ($service)
        {
            $service->delete();
        });

        return redirect()->back()->withSuccess('Service removed!');
    }
}
