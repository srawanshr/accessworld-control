@extends('layout')

@section('title', 'Web Components')

@section('content')
    {{ Form::open(["route" => "component.web.store", "class" => "form form-validate", "role" => "form", "novalidate"]) }}
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>View and edit of <strong>Web</strong> component prices</header>
                    <div class="tools">
                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
                    </div>
                </div>
                @include('components.web.form')
            </div>
        </div>
    </section>
    {{ Form::close() }}
@stop