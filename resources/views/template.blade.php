<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>My Movie List</title>

        <!-- Fonts -->
		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style type="text/css">
            .nav-tabs {
                border-bottom: none;
            }
        </style>
    </head>
    <body>

    	@include('_includes/nav/topnav')

        <div class="li">
            @yield('content')
        </div>
    	
    	<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>