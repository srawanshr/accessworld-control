@extends('layout')

@section('title', 'VPS Components')

@section('content')
    {{ Form::open(["route" => "component.vps.store", "class" => "form form-validate", "role" => "form", "novalidate"]) }}
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>View and edit of <strong>VPS</strong> component prices</header>
                    <div class="tools">
                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
                    </div>
                </div>
                @include('components.vps.form')
            </div>
        </div>
    </section>
    {{ Form::close() }}
@stop