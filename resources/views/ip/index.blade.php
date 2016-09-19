@extends('layout')

@section('title', 'IP Pool')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">IP Pool</header>
                </div>
                <div class="card-body">
                    <table id="dt_ip" class="table order-column hover" data-source="{{ route('ip.list') }}" data-details-source="{{ route('ip.edit') }}">
                        <thead>
                        <tr>
                            <th>
                                <i class="md md-info"></i>
                                <span class="hidden">Info</span>
                            </th>
                            <th>Hostname</th>
                            <th>IP</th>
                            <th>MAC</th>
                            <th>Used</th>
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
<script src="{{ asset('js/libs/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_ip.min.js') }}"></script>
@endpush
