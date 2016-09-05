@extends('layout')

@section('title', 'Page')

@push('styles')
<link href="{{ asset('css/libs/summernote/summernote.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/libs/dropify/dropify.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section>
        <div class="section-body">
            {{ Form::open(['route' =>'page.store','class'=>'form form-validate','role'=>'form', 'files'=>true, 'novalidate']) }}
            @include('page.partials.form', ['header' => 'Create a page'])
            {{ Form::close() }}
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/libs/dropify/dropify.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.summer-note').summernote();
        $('.dropify').dropify();
    });
</script>
@endpush