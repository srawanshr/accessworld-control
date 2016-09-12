@extends('layout')

@section('title', 'Web Packages')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>List of Web Packages</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('webPackage.create') }}"><i class="fa fa-plus"></i> Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="web-package-datatable" class="table table-hover">
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
                                    @if($webPackages->isEmpty())
                                        <tr>
                                            <td class="text-center" colspan="5">No data available.</td>
                                        </tr>
                                    @else
                                        @each('package.web.partials.table', $webPackages, 'webPackage')
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