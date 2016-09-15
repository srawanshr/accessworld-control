@extends('layout')

@section('title', 'Testimonials')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all testimonials</header>
                    <div class="tools">
                        <a class="btn btn-primary" href="{{ route('testimonial.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Customer</th>
                            <th class="text-center">Published</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($testimonials->isEmpty())
                            <tr>
                                <td class="text-center" colspan="3">No data available.</td>
                            </tr>
                        @else
                            @each('testimonial.partials.table', $testimonials, 'testimonial')
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
