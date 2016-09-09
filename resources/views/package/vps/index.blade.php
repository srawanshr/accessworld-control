@extends('layout')

@section('title', 'VPS Packages')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>List of VPS Packages</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('vpsPackage.create') }}"><i class="fa fa-plus"></i> Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="vps-package-datatable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th class="text-right">Price&nbsp;</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if($vpsPackages->isEmpty())
                                        <tr>
                                            <td class="text-center" colspan="5">No data available.</td>
                                        </tr>
                                    @else
                                        @each('package.vps.partials.table', $vpsPackages, 'vpsPackage')
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
@endpush