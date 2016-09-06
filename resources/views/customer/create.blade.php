@extends('layout')

@section('title', 'Users')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Create a user</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::open(['route' =>'user.store','class'=>'form form-validate','role'=>'form','files'=>true, 'novalidate'=>'novalidate']) }}
                @include('user.partials.form')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/preview.js') }}"></script>
@endpush
