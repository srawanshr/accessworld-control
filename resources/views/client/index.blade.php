@extends('layout')

@section('title', 'Clients')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all clients</header>
                    <div class="tools">
                        <a class="btn btn-primary" href="{{ route('client.create') }}">
                            <i class="md md-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Website</th>
                            <th class="text-center">Published</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($clients->isEmpty())
                            <tr>
                                <td class="text-center" colspan="4">No data available.</td>
                            </tr>
                        @else
                            @each('client.partials.table', $clients, 'client')
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop