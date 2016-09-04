@extends('layout')

@section('title', 'Service')

@push('styles')
<link href="{{ asset('css/libs/summernote/summernote.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit service
                        <span class="text-primary">{{ $service->name }}</span>
                    </header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::model($service, ['route' => [ 'service.update', $service->slug], 'class' => 'form form-validate floating-label', 'role' => 'form', 'method' => 'PUT', 'files' => true, 'novalidate']) }}
                @include('service.partials.form')
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/preview.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.summer-note').summernote();
    });
</script>
@endpush