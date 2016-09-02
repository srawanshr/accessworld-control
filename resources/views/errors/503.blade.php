@extends('layout')

@section('title', '503')

@section('content')
    @include('errors.partials.template', ['error_code' => '503', 'error_message' => 'Be right back'])
@stop

@section('guest')
    @include('errors.partials.template', ['error_code' => '503', 'error_message' => 'Be right back'])
@stop