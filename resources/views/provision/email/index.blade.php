@extends('layout')

@section('title', 'Vps Provision')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all web provisions</header>
                </div>
                <div class="card-body">
                    <table id="dt_web_provision" class="table order-column hover" data-source="{{ route('provision.email.list') }}" data-details-source="{{ route('component.provision.email.details') }}">
                        <thead>
                        <tr>
                            <th>
                                <i class="md md-view-stream"></i>
                                <span class="hidden">Info</span>
                            </th>
                            <th>Customer</th>
                            <th>Domain</th>
                            <th>Provisioned By</th>
                            <th>Server Domain Id</th>
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
<script src="{{ asset('js/pages/dt_email_provision.min.js') }}"></script>
@endpush