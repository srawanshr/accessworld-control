@extends('layout')

@section('title', 'Clients')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all clients</header>
                    <div class="tools">
                        @if(auth()->user()->can('save.content'))
                            <a class="btn btn-primary" href="{{ route('client.create') }}">
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
                            <th width="50%">Name</th>
                            <th width="20%">Website</th>
                            <th width="10%" class="text-center">Published</th>
                            <th width="15%" class="text-right">Actions</th>
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