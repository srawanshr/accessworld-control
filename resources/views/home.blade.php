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
                                <strong class="pull-right text-success text-lg">
                                    <i class="md md-markunread-mailbox"></i>
                                </strong> <strong class="text-xl">Recent: {{ $count['orders']['recent'] }}</strong><br/>
                                <span class="opacity-50">Orders</span>
                            </div>
                        </div>
                    </div>
                </div>

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

        {{--<div class="row">--}}
            {{--<div class="col-sm-8">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-head">--}}
                        {{--<header>Most Visited Pages (Last 7 Days)</header>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--<table class="table table-responsive">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>URL</th>--}}
                                {{--<th>Page</th>--}}
                                {{--<th class="text-center">Views</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach($analytics['most_visited_pages'] as $page)--}}
                                {{--<tr>--}}
                                    {{--<td>{{ $page['url'] }}</td>--}}
                                    {{--<td>{{ $page['pageTitle'] }}</td>--}}
                                    {{--<td class="text-center">{{ $page['pageViews'] }}</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="col-sm-4">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-head">--}}
                        {{--<header>Top Browsers (Last 7 Days)</header>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--<table class="table table-responsive">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>Browser</th>--}}
                                {{--<th class="text-center">Sessions</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@forelse($analytics['top_browsers'] as $browser)--}}
                                {{--<tr>--}}
                                    {{--<td>{{ $browser['browser'] }}</td>--}}
                                    {{--<td class="text-center">{{ $browser['sessions'] }}</td>--}}
                                {{--</tr>--}}
                            {{--@empty--}}
                                {{--<tr>--}}
                                    {{--<td class="text-center" colspan="2">@lang('messages.empty', ['entity' => 'data'])</td>--}}
                                {{--</tr>--}}
                            {{--@endforelse--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </section>
@stop