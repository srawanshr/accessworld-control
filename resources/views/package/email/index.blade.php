@extends('layout')

@section('title', 'Email Packages')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all email packages</header>
                    <div class="tools">
                        @if(auth()->user()->can('save.content'))
                            <a class="btn btn-primary" href="{{ route('emailPackage.create') }}">
                                <i class="md md-add"></i>
                                Create
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="email-package-datatable" class="table table-hover">
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
                                @if($emailPackages->isEmpty())
                                    <tr>
                                        <td class="text-center" colspan="5">No data available.</td>
                                    </tr>
                                @else
                                    @each('package.email.partials.table', $emailPackages, 'emailPackage')
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