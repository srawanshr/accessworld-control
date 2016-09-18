@extends('layout')

@section('title', 'Web Provision')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">create Email provision
                        <span class="text-primary">({{ $emailOrder->order->customer->name }})</span>
                    </header>
                </div>
                {{ Form::open(['route'=>['provision.email.store',$emailOrder->id],'class'=>'form form-validate','novalidate']) }}
                    @include('provision.email.partials.form')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush