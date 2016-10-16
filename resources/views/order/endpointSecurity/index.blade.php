@extends('layout')

@section('title', 'Order')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all endpoint security orders</header>
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
                    <table id="dt_endpoint_security_order" class="table order-column hover" data-source="{{ route('order.endpointSecurity.list') }}" data-details-source="{{ route('component.order.endpointSecurity.details') }}">
                        <thead>
                        <tr>
                            <th>
                                <i class="md md-info"></i>
                                <span class="hidden">Info</span>
                            </th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>DATE</th>
                            <th>USER COUNT</th>
                            <th>STATUS</th>
                            <th>CREATED BY</th>
                            <th>APPROVED BY</th>
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
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/TableTools.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_endpoint_security_order.min.js') }}"></script>
@endpush