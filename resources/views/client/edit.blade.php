@extends('layout')

@section('title', 'Clients')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit client</header>
                    <div class="tools">
                        <a class="btn btn-default" href="{{ route('client.index') }}">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::model($client,['route'=>['client.update',$client->slug],'class'=>'form form-validate','role'=>'form','novalidate','files'=>true,'method'=>'PUT']) }}
                @include('client.partials.form')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/preview.js') }}"></script>
@endpush