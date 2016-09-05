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
                    @include('testimonial.partials.table')
                </div>
            </div>
        </div>
    </section>
@stop
