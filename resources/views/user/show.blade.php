@extends('layout')

@section('title', $user->name)

@section('content')
    {{ Form::model($user, ['route' => ['user.update', $user->username], 'class'=>'form form-validate', 'method'=>'put','files'=>true]) }}
    <!-- BEGIN PROFILE HEADER -->
    <section class="full-bleed">
        <div class="section-body style-default-dark force-padding">
            <div class="img-backdrop" style="background-image: url('{{ asset('img/login-bg.jpg') }}')"></div>
            <div class="overlay overlay-shade-top stick-top-left height-3"></div>
            <div class="row">
                <div class="col-md-3 col-xs-5">
                    <div class="row text-center">
                        <img class="img-circle border-white border-xl auto-width preview" src="{{ user_avatar(140)  }}" alt="user_avatar" style="width: 140px;"/>
                        {{ Form::file('image', ['class'=>'hidden image-input']) }}
                        <h3>{{$user->name}}<br/>
                            <small class="text-default-bright">{{ auth()->user()->roles->first()->name }}</small>
                        </h3>
                    </div>
                </div>
                <div class="col-md-9 col-xs-7">
                    <div class="width-4 text-center pull-right">
                        @unless(empty($user->created_at))
                            <strong class="text-xl">{{ $user->created_at }}</strong><br/>
                            <span class="text-light opacity-75">Date Joined</span>
                        @endunless
                    </div>
                </div>
            </div>
            @include('partials.errors')
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card card-underline">
                                <div class="card-head">
                                    <header>
                                        <small>Personal info</small>
                                    </header>
                                    <div class="tools">
                                        <input type="submit" class="btn btn-primary" value="Save">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list">
                                        <li class="tile">
                                            <a class="tile-content">
                                                <div class="tile-icon">
                                                    <i class="md md-border-color"></i>
                                                </div>
                                                <div class="tile-text">
                                                    {{ Form::text('first_name', old('first_name'), ['class'=>'form-control', 'placeholder'=>'First Name']) }}
                                                </div>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content">
                                                <div class="tile-icon">
                                                    <i class="md md-border-color"></i>
                                                </div>
                                                <div class="tile-text">
                                                    {{ Form::text('last_name', old('last_name'), ['class'=>'form-control', 'placeholder'=>'Last Name']) }}
                                                </div>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content">
                                                <div class="tile-icon">
                                                    <i class="md md-insert-link"></i>
                                                </div>
                                                <div class="tile-text">
                                                    {{ Form::text('username', old('username'), ['class'=>'form-control', 'readonly', 'disabled']) }}
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card card-underline">
                                <div class="card-head">
                                    <header>
                                        <small>Contact info</small>
                                    </header>
                                    <div class="tools">
                                        <input type="submit" class="btn btn-primary" value="Save">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list">
                                        <li class="tile">
                                            <a class="tile-content">
                                                <div class="tile-icon">
                                                    <i class="md md-place"></i>
                                                </div>
                                                <div class="tile-text">
                                                    {{ Form::text('address', old('address'), ['class'=>'form-control', 'placeholder'=>'Address']) }}
                                                </div>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content">
                                                <div class="tile-icon">
                                                    <i class="md md-local-phone"></i>
                                                </div>
                                                <div class="tile-text">
                                                    {{ Form::text('phone', old('phone'), ['class'=>'form-control', 'placeholder'=>'Phone']) }}
                                                </div>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content">
                                                <div class="tile-icon">
                                                    <i class="md md-insert-link"></i>
                                                </div>
                                                <div class="tile-text">
                                                    {{ Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Email', 'readonly']) }}
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay overlay-shade-bottom stick-bottom-left force-padding text-right">
                <a href="mailto:{{$user->email}}" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Contact me">
                    <i class="md md-mail"></i>
                </a>
                @if(auth()->user()->id == $user->id)
                    <span data-toggle="modal" data-target="#passwordModal">
                        <a href="#" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Change password">
                            <i class="md md-vpn-key"></i>
                        </a>
                    </span>
                @endif
            </div>
        </div>
    </section>
    <!-- END PROFILE HEADER  -->
    {{ Form::close() }}

    <!-- BEGIN PASSWORD FORM MODAL MARKUP -->
    {{ Form::model($user, ['route' => ['user.update', $user->username], 'class'=>'form form-validate', 'method'=>'put','files'=>true]) }}
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="passwordModalLabel">Change Password</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="password" name="password_current" id="password_current" class="form-control" pattern=".{8,}" required title="Minimum of 8 characters.">
                        <label for="password_current" class="control-label">Current Password</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" pattern=".{8,}" required title="Minimum of 8 characters.">
                        <label for="password" class="control-label">New Password</label>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" pattern=".{8,}" required title="Minimum of 8 characters.">
                        <label for="password_confirmation" class="control-label">Repeat Password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    <!-- END PASSWORD FORM MODAL MARKUP -->

@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/preview.js') }}"></script>
@endpush
