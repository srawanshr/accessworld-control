@extends('layout')

@section('title', 'Role')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all roles</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('role.create') }}">
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
                            <th class="text-center">Description</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @each('role.partials.table', $roles, 'role')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
@endpush