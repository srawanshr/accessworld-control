@extends('layout')

@section('title', 'Roles')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Create a role</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;"><i class="md md-arrow-back"></i> Back</a>
                    </div>
                </div>
                {{ Form::open(['route' =>'role.store','class'=>'form form-validate','role'=>'form', 'novalidate']) }}
                <div class="card-body">
                    @include('role.partials.form')
                </div>
                <div class="card-actionbar">
                    <div class="card-actionbar-row">
                        <button type="reset" class="btn btn-flat ink-reaction">Reset</button>
                        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Save</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/pages/form_checkbox_role.min.js') }}"></script>
@endpush
