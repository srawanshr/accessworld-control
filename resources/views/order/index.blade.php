@extends('layout')

@section('title', 'Order')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all orders</header>
                    <div class="tools">
                        @if(auth()->user()->can('save.order'))
                            <a class="btn btn-primary ink-reaction" href="{{ route('order.create') }}">
                                <i class="md md-add"></i>
                                Add
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table id="dt_order"
                           class="table order-column hover"
                           data-source="{{ route('order.list') }}"
                           data-details-source="{{ route('component.order.details') }}">
                        <thead>
                        <tr>
                            <th>
                                <i class="md md-info"></i>
                            </th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>DATE</th>
                            <th>CREATED BY</th>
                            <th>STATUS</th>
                            <th>APPROVED BY</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@push('styles')
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/TableTools.min.css') }}" />
<style>
    .form-inline {
        display: inline-block;
        margin: 0;
    }
    .form-inline .btn {
        margin: 0;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_order.min.js') }}"></script>
@endpush