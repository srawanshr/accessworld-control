@extends('layout')

@section('title', 'DHCP')

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route'=>'dhcp.map.store','class'=>'form-horizontal form-validate']) }}
            <div id="dhcp_map_card" class="card">
                <div class="card-head style-accent-bright">
                    <header class="text-capitalize">add new DHCP record</header>
                    <div class="tools">
                        <div class="btn-group">
                            <a class="btn btn-icon-toggle btn-collapse">
                                <i class="md md-arrow-drop-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('ip', 'IP Address', ['class'=>'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::select('ip', ips(), old('ip'), ['class'=>'form-control select2-list', 'required']) }}
                            <div class="form-control-line"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('mac', 'MAC Address', ['class' => 'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('mac', null, ['class'=>'form-control', 'required']) }}
                            <div class="form-control-line"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('hostname', 'Hostname', ['class' => 'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('hostname', null, ['class'=>'form-control', 'required']) }}
                            <div class="form-control-line"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('serial', 'Serial', ['class' => 'col-sm-4 control-label']) }}
                        <div class="col-sm-8">
                            {{ Form::text('serial', null, ['class'=>'form-control', 'required']) }}
                            <div class="form-control-line"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-primary pull-right" value="Save">
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all DHCP IPs</header>
                </div>
                <div class="card-body">
                    <table id="dt_dhcp_map" class="table order-column hover" data-source="{{ route('dhcp.map.list') }}" data-details-source="{{ route('dhcp.map.edit') }}">
                        <thead>
                        <tr>
                            <th>
                                <i class="md md-info"></i>
                            </th>
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
<link rel="stylesheet" href="{{ asset('css/libs/select2/select2.css') }}"/>
@endpush

@push('scripts')
<script>
    $(document).on("click", ".btn-collapse", function () {
        materialadmin.AppCard.toggleCardCollapse($("#dhcp_map_card"));
    });
</script>
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_dhcp_map.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/libs/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('js/libs/select2/select2.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(".select2-list").select2({
            allowClear: true
        });
    });
</script>
@endpush
