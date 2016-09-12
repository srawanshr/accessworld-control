@extends('layout')

@section('title', 'Data Cener | Add')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Create a data center</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('dataCenter.index') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                {{ Form::open(['route' => 'dataCenter.store', 'class' => 'form form-validate', 'role' => 'form', 'novalidate', 'files'=>true]) }}
                    @include('dataCenter.partials.form')
                {{ Form::close() }}
            </div><!--end .card -->
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/preview.js') }}"></script>
@endpush