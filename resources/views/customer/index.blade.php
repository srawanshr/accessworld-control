@extends('layout')

@section('title', 'Customers')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all customers</header>
                    <div class="tools">
                        @if(auth()->user()->can('save.customer'))
                            <a class="btn btn-primary ink-reaction" href="{{ route('customer.create') }}">
                                <i class="md md-person-add"></i>
                                Add
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table id="dt_customer" class="table order-column hover" data-source="{{ route('customer.list') }}" data-details-source="{{ route('component.customer.details') }}">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
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
<script src="{{ asset('js/pages/dt_customer.min.js') }}"></script>
@endpush
