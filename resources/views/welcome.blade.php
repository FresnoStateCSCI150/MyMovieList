@extends ('layout')

@section ('content')

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                MyMovieList
            </div>

            <div class="links">
                <a href="/login">Login</a>
                <a href="/register">Register</a>
                <a href="/discussion">Discussions</a>
                <a href="/about">About</a>
                <a href="https://github.com/FresnoStateCSCI150/MyMovieList">GitHub</a>
            </div>
        </div>
    </div>

@endsection


