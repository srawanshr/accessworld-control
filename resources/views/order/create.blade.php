@extends('layout')

@section('title', 'Order')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/libs/bootstrap-datepicker/datepicker3.css') }}" />
@endpush

@section('content')
    <section id="order-app">
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
                        <button type="submit" class="btn btn-primary" :class="{ 'disabled' : ! order.items.length }">
                            <i class="md md-save"></i>
                            Save
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                {{ Form::select('customer_id',$customers,null,['id'=>'order_customer_id','class'=>'form-control','placeholder'=>'Select a customer', 'v-model' => 'order.customer_id']) }}
                                <label for="order_customer_id">Customer</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group control-width-normal">
                                <div class="input-group date" id="order-date">
                                    <div class="input-group-content">
                                        {{ Form::text('date',\Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control date-picker','placeholder'=>'Select a service','v-model' => 'order.date', 'required']) }}
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
            <br />
            <div id="service-orders">
                <div v-for="item in order.items">
                    <order-item :item.sync="item"></order-item>
                </div>
            </div>

            <template id="order-template">
                @include('order.partials.form')
            </template>

            {{ Form::close() }}
        </div>
        <div class="text-center">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-3">
                            {{ Form::select('service_id', $services, null, ['id'=>'service_id','class'=>'form-control','placeholder'=>'Select a service', 'v-model' => 'new_order.type']) }}
                        </div>
                        <div class="col-sm-3">
                            <button type="button" @click="addItemInOrder" class="btn btn-lg btn-primary ink-reaction"
                                                        :class="{ 'disabled' : !type_selected }" data-url=
                                                        "{{ route('component.order.form') }}">
                            <i class="md md-add"></i>
                                                        Add Service
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/pages/form_order.min.js') }}"></script>
<script src="{{ asset('assets/js/vue.js') }}"></script>
<script>
    var vm = new Vue({
        el: '#order-app',

        data: function () {
            return {
                order: {
                    customer_id: '',
                    date: '{{ date('Y-m-d') }}',
                    items: [
                        @foreach(['vps', 'web', 'email'] as $type)
                        @unless(empty(old($type)))
                        @foreach(old($type) as $item)
                        {!! json_encode($item) !!},
                        @endforeach
                        @endunless
                        @endforeach
                    ]
                },
                new_order: {
                    type: ''
                }
            }
        },

        computed: {
            type_selected: function () {
                return this.new_order.type != "";
            }
        },

        methods: {
            addItemInOrder: function () {
                var item = {
                    id: this.makeId(),
                    type: this.new_order.type
                };

                this.order.items.push(item);
            },
            makeId: function () {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for (var i = 0; i < 5; i++)
                    text += possible.charAt(Math.floor(Math.random() * possible.length));

                return text;
            }
        },

        events: {
            'remove-item': function (item) {
                this.order.items.$remove(item);
            }
        },

        components: {
            'order-item': {
                template: '#order-template',
                
                data: function () {
                    return {}
                },

                methods: {
                    selfDestruct: function (item) {
                        this.$dispatch('remove-item', item);
                    }
                },

                props: ['item']
            }
        }
    });
</script>
@endpush