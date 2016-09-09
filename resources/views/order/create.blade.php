@extends('layout')

@section('title', 'Order')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/libs/bootstrap-datepicker/datepicker3.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/libs/wizard/wizard.css') }}"/>
@endpush

@section('content')
    <section>
        <div class="section-body">
            @include('partials.errors')
            {{ Form::open(['route'=>'order.store','class'=>'form form-validate', 'novalidate']) }}
            <div class="card">
                <div class="card-head">
                    <header>Create order</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="md md-save"></i>
                            Save
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                {{ Form::select('customer_id',$customers,null,['id'=>'order_customer_id','class'=>'form-control','placeholder'=>'Select a customer']) }}
                                <label for="order_customer_id">Customer</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group control-width-normal">
                                <div class="input-group date" id="order-date">
                                    <div class="input-group-content">
                                        {{ Form::text('date',\Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control date-picker','placeholder'=>'Select a service','required']) }}
                                        <label>Order Date</label>
                                        <p class="help-block">yyyy-mm-dd</p>
                                    </div>
                                    <span class="input-group-addon"><i class="md md-event"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="button" id="add-service-order" class="btn btn-lg btn-primary ink-reaction" data-url="{{ route('component.order.form') }}">
                    <i class="md md-add"></i>
                    Add Service
                </button>
            </div>
            <br/>
            <div id="service-orders">
                @if(old('vps'))
                    @foreach(old('vps') as $key => $values)
                        @include('order.partials.form', ['service' => \App\Models\Service::whereSlug('vps')->first(), 'key' => $key])
                    @endforeach
                @endif
                @if(old('web'))
                    @foreach(old('web') as $key => $values)
                        @include('order.partials.form', ['service' => \App\Models\Service::whereSlug('web')->first(), 'key' => $key])
                    @endforeach
                @endif
                @if(old('email'))
                    @foreach(old('email') as $key => $values)
                        @include('order.partials.form', ['service' => \App\Models\Service::whereSlug('email')->first(), 'key' => $key])
                    @endforeach
                @endif
            </div>
            {{ Form::close() }}
        </div>
    </section>

    <template id="select-service">
        <div class="form-group">
            {{ Form::select('service_id', $services, null, ['id'=>'service_id','class'=>'form-control','placeholder'=>'Select a service']) }}
        </div>
    </template>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/pages/form_order.min.js') }}"></script>
@endpush