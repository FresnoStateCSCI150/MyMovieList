<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Movie List</title>

        <!-- Fonts -->
		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <!-- Styles -->
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