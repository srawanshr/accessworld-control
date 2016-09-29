@extends('layout')

@section('title', 'Traffic')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">traffic</header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 small-padding">
                            <form class="form">
                                <h4>Search Params</h4>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Name</label>
                                        <select id="q_name" class="form-control select2-list query" data-col="0">
                                            <option value="">[All]</option>
                                        @foreach($names as $name)
                                                <option value="{{ $name }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>UUID</label>
                                        <select id="q_uuid" class="form-control select2-list query" data-col="1">
                                            <option value="">[All]</option>
                                        @foreach($uuids as $uuid)
                                                <option value="{{ $uuid }}">{{ $uuid }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Year</label>
                                        <select id="q_year" class="form-control select2-list query" data-col="2">
                                            <option value="">[All]</option>
                                        @foreach($years as $year)
                                                <option value="{{ $year }}">{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Month</label>
                                        <select id="q_month" class="form-control select2-list query" data-col="3">
                                            <option value="">[All]</option>
                                        @foreach($months as $month)
                                                <option value="{{ $month }}">{{ $month }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Total Bandwidth</label>
                                        <select id="q_total" class="form-control select2-list query" data-col="4">
                                            <option value="">[All]</option>
                                            <option value="1">0 - 200 GB </option>
                                            <option value="2">201 - 500 GB </option>
                                            <option value="3"> 501 and above GB </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12">
                            <table id="dt_traffic" class="table order-column hover" data-source="{{ route('traffic.monthly.list') }}">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>UUID</th>
                                    <th>Year</th>
                                    <th>Month</th>
                                    <th>Upload</th>
                                    <th>Download</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@push('styles')
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/TableTools.min.css') }}"/>
<link href="{{ asset('css/libs/select2/select2.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_traffic_monthly.min.js') }}"></script>
<script src="{{ asset('js/libs/select2/select2.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".select2-list").select2();
    });
</script>
@endpush
