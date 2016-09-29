@extends('layout')

@section('title', 'Home')

@section('content')
    <section>
        <div class="section-body">
            <div class="row">

                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-info no-margin">
                                <strong class="pull-right text-success text-lg">{{ $count['customers']['total'] }}
                                    <i class="md md-people"></i>
                                </strong>
                                <strong class="text-xl">Active: {{ $count['customers']['active'] }}</strong><br/>
                                <span class="opacity-50">Customers</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-info no-margin">
                                <strong class="pull-right text-success text-lg">{{ $count['users']['total'] }}
                                    <i class="md md-face-unlock"></i>
                                </strong> <strong class="text-xl">Active: {{ $count['users']['active'] }}</strong><br/>
                                <span class="opacity-50">Users</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="alert alert-callout alert-info no-margin">
                                <strong class="pull-right text-success text-lg">{{ $count['staff']['total'] }}
                                    <i class="md md-assignment-ind"></i>
                                </strong> <strong class="text-xl">Active: {{ $count['staff']['active'] }}</strong><br/>
                                <span class="opacity-50">Staff</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop