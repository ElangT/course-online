<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kursusin' ) }}</title>

    <!-- Styles -->
    <link href="{{ asset('/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/js/awesomplete.css')}}" />

    <link href="{{ asset('/css/kursusin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/navbar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/footer.css')}}" rel="stylesheet" type="text/css">

    @yield('additional-css')

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <!-- Bootstrap Core CSS -->
</head>
<body>
        @if(strpos(Route::currentRouteName(), 'provider') !== false or Auth::guard('provider')->check())
            @include('layouts.nav-provider')
        @else
            @include('layouts.nav')
        @endif
        @yield('header')
        <div class="container" id="content">
            @yield('content')
        </div>
        <!-- <div class="search-form">
            <div class="search-layout">
            </div>
        </div> -->

        @include('layouts.footer')
    <!-- jQuery -->
    <script src="{{ asset('/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/awesomplete.js')}}" async></script>
    <script src="{{ asset('/js/kursusin.js')}}"></script>
    @yield('additional-js')

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    @yield('extra-js')
</body>

</html>
