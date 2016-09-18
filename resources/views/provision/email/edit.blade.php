@extends('layout')

@section('title', 'Web Provision')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">edit email provision
                        <span class="text-primary">({{ $emailProvision->customer->name }})</span>
                    </header>
                </div>
                {{ Form::model($emailProvision, ['route'=>['provision.email.update',$emailProvision->id],'class'=>'form form-validate','novalidate']) }}
                {{ method_field('PUT') }}
                @include('provision.email.partials.form-edit')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush