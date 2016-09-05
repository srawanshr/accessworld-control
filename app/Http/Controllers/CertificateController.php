<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Certificate;
use Illuminate\Http\Request;

use App\Http\Requests;

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
    public function store(Request $request)
    {
        $inputs = $request->all();

        $inputs['slug'] = str_slug($inputs['title']);

        DB::transaction(function () use ($inputs, $request) {
            $certificate = Certificate::create($inputs);

            $this->uploadRequestImage($request, $certificate);
        });

        return redirect()->back()->with('success', 'Certificate created!');
    }

    /**
     * @param Certificate $certificate
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    /**
     * @param Request $request
     * @param Certificate $certificate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Certificate $certificate)
    {
        $inputs = $request->all();

        DB::transaction(function () use ($inputs, $request, $certificate) {
            $certificate->update($inputs);

            $this->uploadRequestImage($request, $certificate);
        });

        return redirect()->back()->with('success', 'Certificate updated!');
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
