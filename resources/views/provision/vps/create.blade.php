@extends('layout')

@section('title', 'Vps Provision')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">create vps provision
                        <span class="text-primary">({{ $vpsOrder->order->customer->name }})</span>
                    </header>
                </div>
                {{ Form::open(['route'=>['provision.vps.store',$vpsOrder->id],'class'=>'form form-validate','novalidate']) }}
                    @include('provision.vps.partials.form')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush