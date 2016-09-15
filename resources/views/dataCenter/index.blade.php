@extends('layout')

@section('title', 'Data Centers')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all data centers</header>
                    <div class="tools">
                        <a class="btn btn-primary" href="{{ route('dataCenter.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th class="text-center">Prefix</th>
                            <th class="text-right">Actions</th>
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

