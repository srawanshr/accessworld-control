@extends('layout')

@section('title', 'Vps Provision')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">edit vps provision
                        <span class="text-primary">({{ $vpsProvision->customer->name }})</span>
                    </header>
                </div>
                {{ Form::model($vpsProvision, ['route'=>['provision.vps.update',$vpsProvision->id],'class'=>'form form-validate','novalidate']) }}
                {{ method_field('PUT') }}
                @include('provision.vps.partials.form-edit')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush