@extends('layout')

@section('title', '500')

@section('content')
    @include('errors.partials.template', ['error_code' => '500', 'error_message' => 'Oops! Something went wrong'])
@stop

@section('guest')
    @include('errors.partials.template', ['error_code' => '500', 'error_message' => 'Oops! Something went wrong'])
@stop