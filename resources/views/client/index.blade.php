@extends('layout')

@section('title', 'Clients')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>List of clients</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('client.create') }}"><i
                                    class="fa fa-plus"></i>
                            Add</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Logo</th>
                            <th width="40%">Name</th>
                            <th width="30%">Website</th>
                            <th width="15%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($clients->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">No data available.</td>
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


@push('scripts')
@endpush
