<?php

namespace App\Http\Controllers;

use DB;
use App\Models\VpsPackage;
use App\Http\Requests\StoreVpsPackage;
use App\Http\Requests\UpdateVpsPackage;

use Illuminate\Http\Request;
use App\Http\Requests;

class VpsPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vpsPackages = country()->vpsPackages;

        return view('package.vps.index', compact('vpsPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('package.vps.create');
    }

    /**
     * @param StoreVpsPackage $request
     * @return mixed
     */
    public function store(StoreVpsPackage $request)
    {
        DB::transaction(function () use ($request) {
            country()->vpsPackages()->create($request->data());
        });

        return redirect()->route('vpsPackage.index')->withSuccess('Package created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param VpsPackage $vpsPackage
     * @return \Illuminate\Http\Response
     * @internal param VpsPackage $package
     * @internal param int $id
     */
    public function edit(VpsPackage $vpsPackage)
    {
        return view('package.vps.edit', compact('vpsPackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VpsPackageRequest|UpdateVpsPackage $request
     * @param VpsPackage $vpsPackage
     * @return \Illuminate\Http\Response
     * @internal param VpsPackage $package
     * @internal param int $id
     */
    public function update(UpdateVpsPackage $request, VpsPackage $vpsPackage)
    {
        DB::transaction(function () use ($request, $vpsPackage) {
            $vpsPackage->update($request->data());
        });

        return redirect()->route('vpsPackage.index')->withSuccess('Package updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param VpsPackage $package
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(VpsPackage $package)
    {
        DB::transaction(function () use ($package) {
            $package->delete();
        });

        return redirect()->back()->withSuccess('Package deleted!');
    }
}
