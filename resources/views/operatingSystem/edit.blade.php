@extends('layout')

@section('title', 'Operating System')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit operating system ({{ $operatingSystem->name }})</header>
                    <div class="tools">
                        <a class="btn btn-default" href="{{ route('operatingSystem.index') }}">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::model($operatingSystem, ['route' => ['operatingSystem.update', $operatingSystem->slug ], 'class' => 'form form-validate', 'method' => 'PUT', 'role' => 'form', 'novalidate' => 'novalidate', 'files' => true]) }}
                @include('operatingSystem.partials.form')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/preview.js') }}"></script>
@endpush