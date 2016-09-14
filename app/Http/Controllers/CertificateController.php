<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Certificate;
use App\Http\Requests\StoreCertificate;
use App\Http\Requests\UpdateCertificate;

use App\Http\Requests;
use Illuminate\Http\Request;

class CertificateController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $certificates = Certificate::all();

        return view('certificate.index', compact('certificates'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('certificate.create');
    }

    /**
     * @param StoreCertificate $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCertificate $request)
    {
        DB::transaction(function () use ($request)
        {
            $certificate = Certificate::create($request->data());

            $this->uploadRequestImage($request, $certificate);
        });

        return redirect()->route('certificate.index')->withSuccess(trans('messages.create_success', ['entity' => 'Certificate']));
    }

    /**
     * @param Certificate $certificate
     * @return \Illuminate\View\View
     */
    public function edit(Certificate $certificate)
    {
        return view('certificate.edit', compact('certificate'));
    }

    /**
     * @param UpdateCertificate $request
     * @param Certificate $certificate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCertificate $request, Certificate $certificate)
    {
        DB::transaction(function () use ($request, $certificate)
        {
            $certificate->update($request->data());

            $this->uploadRequestImage($request, $certificate);
        });

        return redirect()->route('certificate.index')->withSuccess(trans('messages.update_success', ['entity' => 'Certificate']));
    }

    /**
     * @param Certificate $certificate
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return back()->withSuccess(trans('messages.delete_success', ['entity' => 'Certificate']));
    }
}
