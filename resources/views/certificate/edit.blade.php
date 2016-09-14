@extends('layout')

@section('title', 'Certificates')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit certificate</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('certificate.index') }}">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::model($certificate,['route'=>['certificate.update',$certificate->slug],'class'=>'form form-validate','files'=>true,'novalidate']) }}
                {{ method_field('PUT') }}
                @include('certificate.partials.form')
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