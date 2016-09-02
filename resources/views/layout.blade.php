<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('website.name') }}</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="{{ config('website.keywords') }}">
    <meta name="description" content="{{ config('website.description') }}">
    <meta name="author" content="{{ config('website.author') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- END META -->

    <!-- BEGIN FAVICON -->
    <link rel="icon" type="image/png" href="{{ config('website.favicon') }}"/>
    <!-- END FAVICON -->

    <!-- BEGIN STYLESHEETS -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materialadmin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/libs/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- END STYLESHEETS -->
    @stack('styles')

    <!--[if lte IE 9]>
    <script type="text/javascript" src="{{ asset('js/libs/utils/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libs/utils/respond.min.js') }}"></script><![endif]-->
</head>
<body class="menubar-hoverable header-fixed menubar-pin ">
@if (auth()->guest())
    @yield('guest')
@else
    @include('partials.header')
    <!-- BEGIN BASE-->
    <div id="base">
        <!-- BEGIN CONTENT-->
        <div id="content">
            @yield('content')
        </div><!--end #content-->
        <!-- END CONTENT -->
        @include('partials.menubar')
    </div>
    <!-- END BASE -->
@endif

<!-- BEGIN JAVASCRIPT -->
<script src="{{ asset('js/libs/jquery/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('js/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/libs/spin.js/spin.min.js') }}"></script>
<script src="{{ asset('js/libs/autosize/jquery.autosize.min.js') }}"></script>
<script src="{{ asset('js/libs/bootbox/bootbox.min.js') }}"></script>
<script src="{{ asset('js/libs/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/libs/nanoscroller/jquery.nanoscroller.min.js') }}"></script>
<script src="{{ asset('js/core/source/App.min.js') }}"></script>
<script src="{{ asset('js/core/source/AppNavigation.min.js') }}"></script>
<script src="{{ asset('js/core/source/AppCard.min.js') }}"></script>
<script src="{{ asset('js/core/source/AppForm.min.js') }}"></script>
<script src="{{ asset('js/core/source/AppVendor.min.js') }}"></script>
<script src="{{ asset('js/core/source/AppToast.min.js') }}"></script>
<script src="{{ asset('js/core/source/AppBootBox.min.js') }}"></script>
<!-- END JAVASCRIPT -->

<!-- START UTILITY SCRIPT -->
@include('partials.script')
<!-- END UTILITY SCRIPT -->

<!-- BEGIN PAGE LEVEL JAVASCRIPT -->
@stack('scripts')
<!-- END PAGE LEVEL JAVASCRIPT -->
</body>
</html>