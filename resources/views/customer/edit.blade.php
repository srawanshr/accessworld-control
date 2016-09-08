@extends('layout')

@section('title', 'Customers')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit customer
                        <span class="text-primary">({{ $customer->name }})</span>
                    </header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::model($customer, [
                    'route' => ['customer.update', $customer->username],
                    'class' => 'form form-validate',
                    'method' => 'PUT',
                    'role' => 'form',
                    'files' => true,
                    'novalidate'
                ]) }}
                @include('customer.partials.form')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/preview.js') }}"></script>
@endpush
