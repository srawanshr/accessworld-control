<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonial;
use App\Http\Requests\UpdateTestimonial;
use App\Models\Customer;
use DB;
use App\Http\Requests;
use App\Models\Testimonial;
use Illuminate\Http\Request;


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::pluck('username', 'id');

        return view('testimonial.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonial $request)
    {
        DB::transaction(function () use ($request)
        {
            Testimonial::create($request->data());
        });

        return redirect()->route('testimonial.index')->withSuccess('Testimonial created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Testimonial $testimonial
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Testimonial $testimonial
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(UpdateTestimonial $request, Testimonial $testimonial)
    {
        DB::transaction(function () use ($request, $testimonial)
        {
            $testimonial->update($request->data());
        });

        return redirect()->route('testimonial.index')->withSuccess('Testimonial updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Testimonial $testimonial
     * @return \Illuminate\Http\Response
     * @throws \Exception
     * @internal param int $id
     */
    public function destroy(Testimonial $testimonial)
    {
        return redirect()->back()->withSuccess('Testimonial deleted!');
    }
}
