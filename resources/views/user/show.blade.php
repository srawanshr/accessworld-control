@extends('admin.layouts.master')

@section('title', $user->display_name)

@section('header')
    <style type="text/css">
        .list .tile .tile-icon {
            padding: 0px 0 0.6em 0;
        }

        .modal-dialog {
            width: 30em;
        }

        .profile-picture {
            position: relative;
        }

        .profile-picture:hover > .btn {
            display: block;
        }

        .profile-picture .btn {
            display: none;
            position: absolute;
            left: 50%;
            top: 50%;
            margin-top: -11px;
            margin-left: -28px;
        }
    </style>
@stop

@section('content')
    <!-- BEGIN PROFILE HEADER -->
    {{ Form::model($user, ['route' => ['admin.user.update', $user->slug], 'class'=>'form form-validate', 'method'=>'put','files'=>true]) }}
    <section class="full-bleed">
        <div class="section-body style-default-dark force-padding text-shadow">
            <div class="img-backdrop" style="background-image: url('{{ asset('assets/img/img16.jpg') }}')"></div>
            <div class="overlay overlay-shade-top stick-top-left height-3"></div>
            <div class="row">
                <div class="col-md-3 col-xs-5 text-center">
                    <div class="row">
                        <div class="col-sm-12 profile-picture">
                            <img class="img-circle border-white border-xl auto-width" src="{{$user->image->thumbnail()}}" alt=""/>
                            <button class="btn btn-xs btn-raised btn-primary ink-reaction" type="button">Change</button>
                            {{ Form::file('profile_picture', ['class'=>'hidden profile-picture']) }}
                        </div>
                        <div class="col-sm-12">
                            <h3>{{$user->display_name}}<br/>
                                <small>{{\Auth::user()->roles->pluck('name')->implode(', ')}}</small>
                            </h3>
                        </div>
                    </div>
                </div><!--end .col -->
                <div class="col-md-9 col-xs-7">
                    <div class="width-4 text-center pull-right">
                        <strong class="text-xl">{{$user->created_at->toDateString()}}</strong><br/>
                        <span class="text-light opacity-75">Date Joined</span>
                    </div>
                </div><!--end .col -->
            </div><!--end .row -->
            <div class="overlay overlay-shade-bottom stick-bottom-left force-padding text-right">
                <a href="mailto:{{$user->email}}" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Contact me">
                    <i class="fa fa-envelope"></i>
                </a>
                <span data-toggle="modal" data-target="#passwordModal">
                    <a href="#" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Change password">
                        <i class="fa fa-key"></i>
                    </a>
                </span>
            </div>
        </div><!--end .section-body -->
    </section>
    <!-- END PROFILE HEADER  -->

    <section class="no-padding">
        <div class="section-body no-margin">
            <div class="row">
                <h2>&nbsp;</h2>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card card-underline">
                                <div class="card-head">
                                    <header>
                                        <small>Personal info</small>
                                    </header>
                                    <div class="tools">
                                        <button type="submit" class="btn btn-icon-toggle ink-reaction">
                                            <i class="md md-save"></i>
                                        </button>
                                    </div><!--end .tools -->
                                </div>
                                <div class="card-body">
                                    <ul class="list">
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-icon">
                                                    <i class="md md-border-color"></i>
                                                </div>
                                                <div class="tile-text">
                                                    {{ Form::text('detail[first_name]', old('first_name'), ['class'=>'form-control', 'placeholder'=>'First Name']) }}
                                                </div>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-icon">
                                                    <i class="md md-border-color"></i>
                                                </div>
                                                <div class="tile-text">
                                                    {{ Form::text('detail[last_name]', old('last_name'), ['class'=>'form-control', 'placeholder'=>'Last Name']) }}
                                                </div>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-icon">
                                                    <i class="md md-insert-link"></i>
                                                </div>
                                                <div class="tile-text">
                                                    {{ Form::text('username', old('username'), ['class'=>'form-control', 'readonly']) }}
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div>
                        <div class="col-sm-6">
                            <div class="card card-underline">
                                <div class="card-head">
                                    <header>
                                        <small>Contact info</small>
                                    </header>
                                    <div class="tools">
                                        <button type="submit" class="btn btn-icon-toggle ink-reaction"><i
                                                    class="md md-save"></i></button>
                                    </div><!--end .tools -->
                                </div>
                                <div class="card-body">
                                    <ul class="list">
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-icon">
                                                    <i class="md md-location-on"></i>
                                                </div>
                                                <div class="tile-text">
                                                    {{ Form::text('detail[address]', old('address'), ['class'=>'form-control', 'placeholder'=>'Address']) }}
                                                </div>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-icon">
                                                    <i class="md md-local-phone"></i>
                                                </div>
                                                <div class="tile-text">
                                                    {{ Form::text('detail[phone]', old('phone'), ['class'=>'form-control', 'placeholder'=>'Phone']) }}
                                                </div>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-icon">
                                                    <i class="md md-insert-link"></i>
                                                </div>
                                                <div class="tile-text">
                                                    {{ Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Email']) }}
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{ Form::close() }}

    <!-- BEGIN PASSWORD FORM MODAL MARKUP -->
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="passwordModalLabel">Change Password</h4>
                </div>
                {{ Form::open(['route'=>['admin.user.changePassword', $user->slug], 'class'=>'form form-validate', 'role'=>'form', 'method'=>'PUT']) }}
                <div class="modal-body">
                    <div class="form-group">
                        <input type="password" name="password_current" id="password_current" class="form-control"
                               pattern=".{8,}" required title="Minimum of 8 characters.">
                        <label for="password_current" class="control-label">Current Password</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" pattern=".{8,}"
                               required title="Minimum of 8 characters.">
                        <label for="password" class="control-label">New Password</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control" pattern=".{8,}" required title="Minimum of 8 characters.">
                        <label for="password_confirmation" class="control-label">Repeat Password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {{ Form::close() }}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END PASSWORD FORM MODAL MARKUP -->
@stop

@section('footer')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.profile-picture .btn').click(function () {
                $('.profile-picture').trigger('click');
            });
            $('.profile-picture').change(function () {
                $(this).closest('form').submit();
            });
        })
    </script>
@stop
