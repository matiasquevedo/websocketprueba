<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans&display=swap" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-4.4.1/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href=" {{asset('plugins/fontawesome-5.11.2/css/all.css')}} ">
    <link rel="stylesheet" href=" {{asset('plugins/rangeslider.js-2.3.0/rangeslider.css')}} ">
    <link rel="stylesheet" href="{{ asset('plugins/leaflet/leaflet.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/leaflet-geocoder/dist/Control.Geocoder.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/leaflet-fullscreen/dist/leaflet.fullscreen.css')}}">
    <link rel="stylesheet" href=" {{asset('plugins/rangeslider.js-2.3.0/rangeslider.css')}} ">
    

    

    
</head>
<body style="background-color: #f4f5f6 !important;font-family: 'Open Sans', sans-serif;">
    <div>
        @include("layouts.nav")
        <main class="container my-5" >            
            <div id='app'>
                @yield('content')
            </div>
        </main>
    </div>

    {{-- <script src=" {{asset('plugins/jquery/jquery-3.4.1.js')}} " ></script> --}}
    <script src=" {{asset('plugins/popper/popper.min.js')}} " ></script>
    <script src="{{asset('plugins/bootstrap-4.4.1/dist/js/bootstrap.js')}}"></script>
    <script src=" {{asset('plugins/fontawesome-5.11.2/js/all.js')}} "></script>{{-- 
    <script src="{{asset('plugins/rangeslider.js-2.3.0/rangeslider.js')}}"></script>
    <script src="{{asset('plugins/leaflet/leaflet.js')}}"></script>
    <script src="{{asset('plugins/leaflet-geocoder/dist/Control.Geocoder.js')}}"></script>
    <script src="{{asset('plugins/leaflet-fullscreen/dist/leaflet.fullscreen.js')}}"></script>
    <script src='https://unpkg.com/leaflet-image@0.4.0/leaflet-image.js'></script>
    <script src="{{asset('plugins/rangeslider.js-2.3.0/rangeslider.js')}}"></script> --}}
    @yield('js')
</body>
</html>
