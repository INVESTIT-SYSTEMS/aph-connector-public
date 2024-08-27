<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/aph-logo.png') }}" type="image/x-icon">

    <!-- Scripts -->


    <link href="{{ asset('css/panel/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/quill.better-table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/font-awesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('js/leaflet/leaflet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/panel/panel.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Lato:wght@300;400;700;900&display=swap"
        rel="stylesheet">
    @vite(['resources/js/SmartSelect.jsx'])
</head>
<body id="top" @auth('web') class="body-padding" @endauth>
@yield('content')
<div class="mainContainer"></div>
@auth('web')<x-sidebar-menu/>@endauth
<x-delete-confirmation-modal/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/slick.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/quill.js') }}"></script>
<script src="{{ asset('js/chart-script.js') }}"></script>
<script src="{{ asset('js/leaflet/leaflet.js') }}"></script>
<script src="{{asset('js/fontawesome.js')}}"></script>
<script src="{{asset('js/fontawesome.js')}}"></script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/gototop.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"> </script>
<script src="{{asset('js/typed.min.js')}}"></script>
<script src="{{asset('js/remodal.js')}}"></script>
<script src="{{asset('js/intlTelInput-jquery.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/addremove.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/slider-range-script.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

</body>
</html>
