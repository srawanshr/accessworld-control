@extends('layout')

@section('title', 'Web Provision')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">edit vps provision
                        <span class="text-primary">({{ $webProvision->customer->name }})</span>
                    </header>
                </div>
                {{ Form::model($webProvision, ['route'=>['provision.web.update',$webProvision->id],'class'=>'form form-validate','novalidate']) }}
                {{ method_field('PUT') }}
                @include('provision.web.partials.form-edit')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush