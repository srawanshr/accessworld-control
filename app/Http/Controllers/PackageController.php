<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageCreateRequest;
use App\Models\Service;
use DB;

class PackageController extends Controller
{
    public function index(Service $service)
    {
        return view('service.package.index', compact('service'));
    }

    public function create(Service $service)
    {
        return view('service.package.create', compact('service'));
    }

    public function store(Service $service, PackageCreateRequest $request)
    {
        DB::transaction(function () use ($service, $request)
        {
            $package = $service->packages()->create([
                'name'        => $request->get('name'),
                'price'       => $request->get('price'),
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

        return redirect()->route('service.package.index', $service->slug )->withSuccess('Package Created !');

    }
}
