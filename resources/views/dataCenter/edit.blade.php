@extends('layout')

@section('title', 'Data Center | Edit')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Edit a data center</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" href="{{ route('dataCenter.index') }}">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                {{ Form::model($dataCenter, [
                    'route' => ['dataCenter.update', $dataCenter->slug],
                    'class' => 'form form-validate',
                    'method' => 'PUT',
                    'role' => 'form',
                    'novalidate'
                ]) }}
                @include('dataCenter.partials.form')
                {{ Form::close() }}
            </div><!--end .card -->
        </div>
    </section>
@stop

@push('scripts')
@endpush