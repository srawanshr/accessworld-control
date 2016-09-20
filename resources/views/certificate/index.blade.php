@extends('layout')

@section('title', 'Certificates')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all certificates</header>
                    <div class="tools">
                        @if(auth()->user()->can('save.content'))
                            <a class="btn btn-primary" href="{{ route('certificate.create') }}">
                                <i class="md md-add"></i>
                                Add
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="60%">Title</th>
                            <th width="20%" class="text-center">Published</th>
                            <th width="15%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($certificates->isEmpty())
                            <tr>
                                <td class="text-center" colspan="3">No data available.</td>
                            </tr>
                        @else
                            @each('certificate.partials.table', $certificates, 'certificate')
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop