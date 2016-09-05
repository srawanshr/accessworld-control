@extends('layout')

@section('title', 'Staffs')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all staffs</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('staff.create') }}">
                            <i class="md md-person-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dt_staff" class="table order-column hover" data-source="{{route('staff.list')}}">
                        <thead>
                        <tr>
                            <th>
                                <i class="md md-view-stream"></i>
                            </th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>QR</th>
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
<link href="{{ asset('css/libs/DataTables/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/libs/DataTables/extensions/dataTables.colVis.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/libs/DataTables/extensions/dataTables.tableTools.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('js/libs/DataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
@include('staff.partials.table')
@endpush