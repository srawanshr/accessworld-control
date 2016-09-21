@extends('layout')

@section('title', 'Operating Systems')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all operating systems</header>
                    <div class="tools">
                        @if(auth()->user()->can('save.content'))
                            <a class="btn btn-primary" href="{{ route('operatingSystem.create') }}">
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
                            <th width="45%">Name</th>
                            <th width="20%">Price</th>
                            <th width="20%" class="text-center">Active</th>
                            <th width="10%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($operatingSystems->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">No data available.</td>
                            </tr>
                        @else
                            @each('operatingSystem.partials.table', $operatingSystems, 'operatingSystem')
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
