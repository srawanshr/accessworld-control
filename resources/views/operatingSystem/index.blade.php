@extends('layout')

@section('title', 'Operating Systems')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>List of Operating Systems</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('operatingSystem.create') }}"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="os-datatable" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Active</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($operatingSystems->isEmpty())
                                <tr>
                                    <td class="text-center" colspan="5">No data available.</td>
                                </tr>
                            @else
                                @each('operatingsystem.partials.table', $operatingSystems, 'operatingSystem')
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
