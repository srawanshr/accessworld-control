@extends('layout')

@section('title', 'Order')

@section('content')
    <section>
        <div class="section-body">
            @include('partials.errors')
            {{ Form::model($order, ['route'=>['order.update',$order->id],'class'=>'form form-validate','method'=>'put','novalidate']) }}
            <div class="card">
                <div class="card-head">
                    <header>Edit order</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('order.index') }}">
                            <i class="md md-arrow-back"></i>
                            all order
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="md md-save"></i>
                            Save
                        </button>
                        <input type="submit" name="approve" class="btn btn-primary" value="Approve">
                        <input type="submit" name="reject" class="btn btn-primary" value="Reject">
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                {{ Form::select('customer_id',$customers,old('customer_id'),['id'=>'order_customer_id','class'=>'form-control','placeholder'=>'Select a customer']) }}
                                <label for="order_customer_id">Customer</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group control-width-normal">
                                <div class="input-group date" id="order-date">
                                    <div class="input-group-content">
                                        {{ Form::text('date',old('date'),['class'=>'form-control date-picker','placeholder'=>'Select a service','required']) }}
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
            <br/>
            @unless($order->vpsOrder->isEmpty())
                @foreach($order->vpsOrder as $key => $vpsOrder)
                    @include('order.partials.form-edit', ['header'=>'VPS', 'vpsOrder' => $vpsOrder, 'key' => $key])
                @endforeach
            @endunless
            @unless($order->webOrder->isEmpty())
                @foreach($order->webOrder as $key => $webOrder)
                    @include('order.partials.form-edit', ['header'=>'Web Hosting','webOrder' => $webOrder, 'key' => $key])
                @endforeach
            @endunless
            @unless($order->emailOrder->isEmpty())
                @foreach($order->webOrder as $key => $emailOrder)
                    @include('order.partials.form-edit', ['header'=>'Email','emailOrder' => $emailOrder, 'key' => $key])
                @endforeach
            @endunless
            {{ Form::close() }}
        </div>
    </section>
@stop

@push('styles')
<link rel="stylesheet" href="{{ asset('css/libs/bootstrap-datepicker/datepicker3.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<script>
    $('#order-date').datepicker({autoclose: true, todayHighlight: true, format: "yyyy-mm-dd"});
    $(document).on("click", ".card-head .tools .btn-collapse", function (e) {
        var card = $(e.currentTarget).closest('.card');
        materialadmin.AppCard.toggleCardCollapse(card);
    });
</script>
@endpush