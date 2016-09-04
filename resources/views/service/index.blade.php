@extends('layout')

@section('title', 'Service')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>All Services</header>
                    <div class="tools">
                        <a href="{{ route('service.create') }}" class="btn btn-primary">
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
                            <th class="text-center">Active</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('service.partials.table', $services, 'service')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
@endpush