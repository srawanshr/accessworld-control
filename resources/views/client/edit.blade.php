@extends('layout')

@section('title', 'Clients | Edit')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit a client</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('client.index') }}"><i
                                    class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                {!! Form::model($client, ['route' => ['client.update', $client->slug], 'class' => 'form form-validate', 'role' => 'form', 'novalidate', 'files' => true, 'method' => 'PUT']) !!}
                    @include('client.partials.form')
                {!! Form::close() !!}
            </div><!--end .card -->
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/preview.js') }}"></script>
@endpush