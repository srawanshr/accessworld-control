@extends('layout')

@section('title', 'Vps Provision')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">renew vps provision
                        <span class="text-primary">({{ $vpsProvision->name }})</span>
                    </header>
                </div>
                {{ Form::open(['route'=>['provision.vps.extend',$vpsProvision->id],'class'=>'form form-validate','novalidate']) }}
                @include('provision.vps.partials.form-renew')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush