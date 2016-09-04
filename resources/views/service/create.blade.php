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
                    <header>Create service</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::open(['route' => 'service.store', 'class' => 'form form-validate floating-label', 'role' => 'form', 'files' => true, 'novalidate']) }}
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
