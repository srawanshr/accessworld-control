@extends('layout')

@section('title', 'Vps Provision')

@section('content')
    <section>
        <div class="section-body">
            @include('partials.errors')
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">Provision New Web
                        <span class="text-primary">({{ $webOrder->order->customer->name }})</span>
                    </header>
                </div>
                {{ Form::open(['route'=>['provision.web.provision',$webOrder->id],'class'=>'form form-validate','novalidate']) }}
                    @include('provision.web.partials.form-make')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush