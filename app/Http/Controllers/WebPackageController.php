<?php

namespace App\Http\Controllers;

use DB;
use App\Models\WebPackage;
use App\Http\Requests\StoreWebPackage;
use App\Http\Requests\UpdateWebPackage;

use Illuminate\Http\Request;
use App\Http\Requests;

class WebPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webPackages = WebPackage::all();

        return view('package.web.index', compact('webPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('package.web.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  WebPackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWebPackage $request)
    {
        DB::transaction(function () use ($request) {
            WebPackage::create($request->data());
        });

        return redirect()->route('webPackage.index')->withSuccess('Package created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param WebPackage $package
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(WebPackage $webPackage)
    {
        return view('package.web.edit', compact('webPackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WebPackageRequest|UpdateWebPackage $request
     * @param WebPackage $webPackage
     * @return \Illuminate\Http\Response
     * @internal param WebPackage $package
     * @internal param int $id
     */
    public function update(UpdateWebPackage $request, WebPackage $webPackage)
    {
        DB::transaction(function () use ($request, $webPackage) {
            $webPackage->update($request->data());
        });

        return redirect()->route('webPackage.edit', $webPackage->slug)->withSuccess('Package updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param WebPackage $package
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(WebPackage $package)
    {
        DB::transaction(function () use ($package) {
            $package->delete();
        });

        return redirect()->back()->withSuccess('Package deleted!');
    }
}
