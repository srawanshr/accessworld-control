@extends('layout')

@section('title', 'Testimonials')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>List of testimonials</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('testimonial.create') }}"><i
                                    class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Logo</th>
                            <th width="40%">Name</th>
                            <th width="25%">Quote</th>
                            <th width="10%">Published</th>
                            <th width="10%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($testimonials->isEmpty())
                                <tr>
                                    <td class="text-center" colspan="5">No data available.</td>
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
