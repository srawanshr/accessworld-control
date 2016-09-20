@extends('layout')

@section('title', 'Staffs')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all staffs</header>
                    <div class="tools">
                        @if(auth()->user()->can('save.staff'))
                            <a class="btn btn-primary ink-reaction" href="{{ route('staff.create') }}">
                                <i class="md md-person-add"></i>
                                Add
                            </a>
                        @endif
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
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/TableTools.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_staff.min.js') }}"></script>
@endpush