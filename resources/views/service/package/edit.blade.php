@extends('layout')

@section('title', 'Service')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit package
                        <span class="text-primary">{{ $package->name }}</span>
                    </header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::model($package, ['route' => [ 'service.package.update', $service->slug, $package->slug], 'class' => 'form form-validate floating-label', 'role' => 'form', 'method' => 'PUT', 'files' => true, 'novalidate']) }}
                @include('service.package.partials.form')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush