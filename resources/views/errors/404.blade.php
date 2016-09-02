@extends('layout')

@section('title', '404')

@section('content')
    @include('errors.partials.template', ['error_code' => '404', 'error_message' => 'This page does not exist'])
@stop

@section('guest')
    @include('errors.partials.template', ['error_code' => '404', 'error_message' => 'This page does not exist'])
@stop