@extends('layout')

@section('title', 'Operating System | Edit')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit an operating system ({{ $operatingSystem->name }})</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('operatingSystem.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
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