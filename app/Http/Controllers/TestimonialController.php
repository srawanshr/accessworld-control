<?php

namespace App\Http\Controllers;

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

        return view('testimonial.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'quote' => 'required',
        ]);

        DB::transaction(function () use ($request)
        {
            Testimonial::create([
                'quote'  => $request->get('quote'),
            ]);
        });

        return redirect()->back()->withSuccess('Testimonial created!');
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
    public function update(Request $request, Testimonial $testimonial)
    {
        $this->validate($request, [
            'quote' => 'required',
        ]);

        DB::transaction(function () use ($request, $testimonial)
        {
            $testimonial->update([
                'quote'  => $request->get('quote'),
            ]);
        });

        return redirect()->back()->withSuccess('Testimonial updated!');
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
        if (!$this->user->can('delete.cms')) return redirect()->route('errors', '401');

        $testimonial->delete();

        return redirect()->back()->withSuccess('Testimonial deleted!');
    }
}
