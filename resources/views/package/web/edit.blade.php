@extends('layout')

@section('title', 'Web Package | Edit')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit a web package (Name: {{ $webPackage->name }})</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                {{ Form::model($webPackage, ['route' => ['webPackage.update', $webPackage->slug], 'class' => 'form form-validate', 'role' => 'form', 'novalidate', 'method' => 'PUT']) }}
                    @include('package.web.partials.form')
                {{ Form::close() }}
            </div><!--end .card -->
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush