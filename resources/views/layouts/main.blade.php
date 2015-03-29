<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @section('title')
            Bubbles Dog Salon
        @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="{{ asset('css/boilerplate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    {{-- Allow CSS and JS to be included per page --}}
    @yield('css')
    @yield('js')

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="primaryContainer" class="primaryContainer clearfix">
    @include('layouts.partials.nav')

    @yield('content')

    <div class="foot clearfix">
        <p class="copyright">
            Copyright 2015. Bubbles Pet Salon, LLC. All Rights Reserved.
        </p>
        <p class="designer">
            Designd by IN&#x3a;DEEP Arts
        </p>
    </div>
</div>

</body>
</html>
