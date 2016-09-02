@extends('layout')

@section('title', 'Login')

@push('styles')
<style type="text/css">

    body {
        background: rgb(255, 255, 255);
        background-size: 100% 100%;
        color: #313534;
    }

    body {
        background-image: url({{ asset(config('paths.login-bg')) }});
        background-attachment: fixed;
    }

    .logo {
        margin-top: 80px;
        margin-bottom: 15px;
    }
</style>
@endpush

@section('guest')
    <!-- BEGIN LOGIN SECTION -->
    <section class="section-account">
        <div class="row col-md-12 logo" align="center">
            <img src="{{ asset(config('website.logo')) }}" alt="logo" width="100" height="100">
        </div>
        <div class="row col-md-12" align="center">
            <div class="card col-sm-4 col-sm-offset-4 ">
                <div class="card-body">
                    <br/>
                    <span class="text-lg text-bold text-primary">{{ config('website.name') }}</span>
                    <br/><br/>
                    @include('partials.errors')
                    <form class="form form-validate" role="form" style="text-align:left;" method="POST" action="{{ url('/login') }}" autocomplete="off" novalidate>
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" class="form-control" id="login" name="login" required>
                            <label for="login">Username/Email</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <label for="password">Password</label>
                            <p class="help-block">
                                <a href="{{ url('/password/reset') }}" target="_blank">Forgot?</a>
                            </p>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <div class="checkbox checkbox-inline checkbox-styled">
                                    <label>
                                        <input type="checkbox" name="remember">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                            </div><!--end .col -->
                            <div class="col-xs-6 text-right">
                                <button class="btn btn-primary btn-raised" type="submit">Login</button>
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END LOGIN SECTION -->

    <footer class="text-center">
        <p>
            Copyright {{ config('website.name') }} {{date('Y')}}
        </p>
    </footer>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush