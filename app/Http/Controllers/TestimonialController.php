<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonial;
use App\Http\Requests\UpdateTestimonial;
use App\Models\Customer;
use DB;
use App\Http\Requests;
use App\Models\Testimonial;
use Illuminate\Http\Request;


class TestimonialController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('testimonial.index', compact('testimonials'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $customers = Customer::select(['first_name', 'last_name', 'username', 'id'])->get()->pluck('name', 'id');

        return view('testimonial.create', compact('customers'));
    }

    /**
     * @param StoreTestimonial $request
     * @return mixed
     */
    public function store(StoreTestimonial $request)
    {
        Testimonial::create($request->data());

        return redirect()->route('testimonial.index')->withSuccess(trans('messages.create_success', ['entity' => 'Testimonial']));
    }

    /**
     * @param Testimonial $testimonial
     * @return \Illuminate\View\View
     */
    public function edit(Testimonial $testimonial)
    {
        $customers = Customer::select(['first_name', 'last_name', 'username', 'id'])->get()->pluck('name', 'id');

        return view('testimonial.edit', compact('testimonial', 'customers'));
    }

    /**
     * @param UpdateTestimonial $request
     * @param Testimonial $testimonial
     * @return mixed
     */
    public function update(UpdateTestimonial $request, Testimonial $testimonial)
    {
        $testimonial->update($request->data());

        return redirect()->route('testimonial.index')->withSuccess(trans('messages.update_success', ['entity' => 'Testimonial']));
    }

    /**
     * @param Testimonial $testimonial
     * @return mixed
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return back()->withSuccess(trans('messages.delete_success', ['entity' => 'Testimonial']));
    }
}
