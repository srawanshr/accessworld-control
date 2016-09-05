@extends('layout')

@section('title', 'Testimonials | Edit')

@push('styles')
<link href="{{ asset('css/libs/select2/select2.css?1424887857') }}" rel="stylesheet">
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit a testimonial</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::model($testimonial, ['route' => ['testimonial.update', $testimonial->id], 'class' => 'form form-validate floating-label', 'role' => 'form', 'method' => 'PUT', 'files' => true, 'novalidate']) }}
                @include('testimonial.partials.form')
                {{ Form::close() }}
            </div><!--end .card -->
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/select2/select2.min.js?1424887857') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("select").select2({
            maximumSelectionSize: 1
        });
    });
</script>
@endpush