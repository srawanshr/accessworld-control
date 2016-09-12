@extends('layout')

@section('title', 'Data Centers')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>List of data centers</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('dataCenter.create') }}">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th width="10%">Logo</th>
                            <th width="40%">Name</th>
                            <th width="15%">Price</th>
                            <th width="15%">Prefix</th>
                            <th width="10%" class="text-right" data-orderable="false">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($dataCenters->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">No data available.</td>
                            </tr>
                        @else
                            @each('dataCenter.partials.table', $dataCenters, 'dataCenter')
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
@endpush

