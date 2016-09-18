@extends('layout')

@section('title', 'DHCP')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all DHCP IPs</header>
                </div>
                <div class="card-body">
                    <table id="dt_dhcp_map" class="table order-column hover" data-source="{{ route('dhcp.map.list') }}" data-details-source="{{ route('dhcp.map.edit') }}">
                        <thead>
                        <tr>
                            <th><i class="md md-info"></i></th>
                            <th>Hostname</th>
                            <th>IP</th>
                            <th>MAC</th>
                            <th>Subnet</th>
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
<link rel="stylesheet" href="{{ asset('js/DataTables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('js/libs/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_dhcp_map.min.js') }}"></script>
@endpush
