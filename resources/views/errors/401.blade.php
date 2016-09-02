@extends('layout')

@section('title', '401')

@section('content')
    @include('errors.partials.template', ['error_code' => '401', 'error_message' => 'Unauthorized'])
@stop

@section('guest')
    @include('errors.partials.template', ['error_code' => '401', 'error_message' => 'Unauthorized'])
@stop