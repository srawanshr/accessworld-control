@extends('layout')

@section('title', '403')

@section('content')
    @include('errors.partials.template', ['error_code' => '403', 'error_message' => 'Forbidden Request'])
@stop

@section('guest')
    @include('errors.partials.template', ['error_code' => '403', 'error_message' => 'Forbidden Request'])
@stop