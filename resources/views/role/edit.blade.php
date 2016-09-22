@extends('layout')

@section('title', 'Roles | Edit')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit Role: {{ $role->name }}</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('role.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                {{ Form::model($role, ['route' => ['role.update', $role->id],'class'=>'form form-validate','role'=>'form', 'novalidate', 'method' => 'PUT']) }}
                    @include('role.partials.form')
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