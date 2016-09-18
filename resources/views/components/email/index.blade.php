@extends('layout')

@section('title', 'Email Components')

@section('content')
    {{ Form::open(["route" => "component.email.store", "class" => "form form-validate", "role" => "form", "novalidate"]) }}
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>View and edit of <strong>Email</strong> component prices</header>
                    <div class="tools">
                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
                    </div>
                </div>
                @include('components.email.form')
            </div>
        </div>
    </section>
    {{ Form::close() }}
@stop