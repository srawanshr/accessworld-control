@extends('layout')

@section('title', 'Certificates | Edit')

@push('styles')
<link href="{{ asset('css/libs/summernote/summernote.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit a certificate</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('admin.certificate.index') }}"><i
                                    class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                {{ Form::model($certificate, [
                      'route' => [ 'certificate.update', $certificate->slug ],
                      'class' => 'form form-validate',
                      'method' => 'PUT',
                      'role' => 'form',
                      'novalidate',
                      'files'=>true
                ]) }}
                    @include('certificate.partials.form')
                {{ Form::close() }}
            </div><!--end .card -->
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