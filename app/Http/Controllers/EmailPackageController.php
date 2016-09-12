<?php

namespace App\Http\Controllers;


use DB;
use App\Models\EmailPackage;
use App\Http\Requests\StoreEmailPackage;
use App\Http\Requests\UpdateEmailPackage;

use App\Http\Requests;
use Illuminate\Http\Request;

class EmailPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emailPackages = EmailPackage::all();

        return view('package.email.index', compact('emailPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('package.email.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEmailPackage $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmailPackage $request)
    {
        DB::transaction(function () use ($request)
        {
            EmailPackage::create($request->data());
        });

        return redirect()->route('emailPackage.index')->withSuccess('Package created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EmailPackage $package
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(EmailPackage $emailPackage)
    {
        return view('package.email.edit', compact('emailPackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmailPackage $emailPackage
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(UpdateEmailPackage $request, EmailPackage $emailPackage)
    {
        DB::transaction(function () use ($request, $emailPackage)
        {
            $emailPackage->update($request->data());
        });

        return redirect()->route('emailPackage.index', $emailPackage->slug)->withSuccess('Package updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EmailPackage $package
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(EmailPackage $package)
    {
        DB::transaction(function () use ($package)
        {
            $package->delete();
        });

        return redirect()->back()->withSuccess('Package deleted!');
    }
}
