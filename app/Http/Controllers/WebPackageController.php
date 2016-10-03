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
        $webPackages = country()->webPackages;

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
     * @param StoreWebPackage $request
     * @return mixed
     */
    public function store(StoreWebPackage $request)
    {
        DB::transaction(function () use ($request) {
            country()->webPackages()->create($request->data());
        });

        return redirect()->route('webPackage.index')->withSuccess('Package created!');
    }

    /**
     * @param WebPackage $webPackage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(WebPackage $webPackage)
    {
        return view('package.web.edit', compact('webPackage'));
    }

    /**
     * @param UpdateWebPackage $request
     * @param WebPackage $webPackage
     * @return mixed
     */
    public function update(UpdateWebPackage $request, WebPackage $webPackage)
    {
        DB::transaction(function () use ($request, $webPackage) {
            $webPackage->update($request->data());
        });

        return redirect()->route('webPackage.index', $webPackage->slug)->withSuccess('Package updated!');
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
