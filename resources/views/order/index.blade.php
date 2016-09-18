@extends('layout')

@section('title', 'Order')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all orders</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('order.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dt_order" class="table order-column hover" data-source="{{ route('order.list') }}" data-details-source="{{ route('component.order.details') }}">
                        <thead>
                        <tr>
                            <th>
                                <i class="md md-info"></i>
                            </th>
                            <th>CUSTOMER</th>
                            <th>DATE</th>
                            <th>CREATED BY</th>
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
<link href="{{ asset('css/libs/DataTables/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('js/libs/DataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_order.min.js') }}"></script>
@endpush