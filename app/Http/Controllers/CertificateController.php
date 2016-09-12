<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Certificate;
use App\Http\Requests\StoreCertificate;
use App\Http\Requests\UpdateCertificate;

use App\Http\Requests;
use Illuminate\Http\Request;

class CertificateController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $certificates = Certificate::all();

        return view('certificate.index', compact('certificates'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('certificate.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCertificate $request)
    {
        DB::transaction(function () use ($request) {
            $certificate = Certificate::create($request->data());

            $this->uploadRequestImage($request, $certificate);
        });

        return redirect()->route('certificate.index')->with('success', 'Certificate created!');
    }

    /**
     * @param Certificate $certificate
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Certificate $certificate)
    {
        return view('certificate.edit', compact('certificate'));
    }

    /**
     * @param Request $request
     * @param Certificate $certificate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCertificate $request, Certificate $certificate)
    {
        DB::transaction(function () use ($request, $certificate) {
            $certificate->update($request->data());

            $this->uploadRequestImage($request, $certificate);
        });

        return redirect()->route('certificate.index')->with('success', 'Certificate updated!');
    }

    /**
     * @param Certificate $certificate
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->back()->with('success', 'Certificate deleted!');
    }
}
