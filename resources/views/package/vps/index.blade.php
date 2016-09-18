@extends('layout')

@section('title', 'VPS Packages')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all VPS packages</header>
                    <div class="tools">
                        <a class="btn btn-primary" href="{{ route('vpsPackage.create') }}">
                            <i class="md md-add"></i>
                            Create
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="vps-package-datatable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="40%">Name</th>
                                    <th width="10%">Published</th>
                                    <th width="35%" class="text-right">Price&nbsp;</th>
                                    <th width="10%" class="text-right">Actions</th>
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