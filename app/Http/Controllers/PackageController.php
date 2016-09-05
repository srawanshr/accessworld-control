<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackage;
use App\Models\Package;
use App\Models\Service;
use DB;

class PackageController extends Controller
{
    /**
     * @param Service $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Service $service)
    {
        return view('service.package.index', compact('service'));
    }

    /**
     * @param Service $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Service $service)
    {
        return view('service.package.create', compact('service'));
    }

    /**
     * @param Service $service
     * @param StorePackage $request
     * @return mixed
     */
    public function store(Service $service, StorePackage $request)
    {
        DB::transaction(function () use ($service, $request)
        {
            $package = $service->packages()->create([
                'name'        => $request->get('name'),
                'price'       => $request->get('price'),
                'is_published' => $request->get('is_published', false),
                'description' => $request->get('description')
            ]);

            foreach ($request->get('component') as $component)
            {
                $package->components()->create([
                    'name'  => $component['attribute'],
                    'value' => $component['value']
                ]);
            }
        });

        return redirect()->route('service.package.index', $service->slug)->withSuccess('Package Created !');
    }

    /**
     * @param Service $service
     * @param Package $package
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Service $service, Package $package)
    {
        return view('service.package.edit', compact('service', 'package'));
    }

    public function update(Service $service, Package $package, StorePackage $request)
    {
        DB::transaction(function () use ($service, $package, $request)
        {
            $package->update([
                'name'        => $request->get('name'),
                'price'       => $request->get('price'),
                'is_published' => $request->get('is_published', false),
                'description' => $request->get('description')
            ]);

            $package->components()->delete();

            foreach ($request->get('component') as $component)
            {
                $package->components()->create([
                    'name'  => $component['attribute'],
                    'value' => $component['value']
                ]);
            }
        });

        return redirect()->route('service.package.index', $service->slug)->withSuccess('Package Updated !');
    }
}
