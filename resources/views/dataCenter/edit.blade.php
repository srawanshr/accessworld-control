@extends('layout')

@section('title', 'Data Center')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">edit data center</header>
                    <div class="tools">
                        <a class="btn btn-default" href="{{ route('dataCenter.index') }}">
                            <i class="md md-arrow-back"></i>
                            Back
                        </a>
                    </div>
                </div>
                {{ Form::model($dataCenter, ['route' => ['dataCenter.update', $dataCenter->slug],'class' => 'form form-validate','files'=>true,'novalidate']) }}
                @include('dataCenter.partials.form')
                {{ Form::close() }}
            </div><!--end .card -->
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/preview.js') }}"></script>
@endpush