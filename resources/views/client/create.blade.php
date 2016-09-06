@extends('layout')

@section('title', 'Clients | Add')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Add a client</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {!! Form::open(['route' => 'client.store', 'class' => 'form form-validate', 'role' => 'form', 'novalidate', 'files'=>true]) !!}
                    @include('client.partials.form')
                {!! Form::close() !!}
            </div><!--end .card -->
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/preview.js') }}"></script>
@endpush