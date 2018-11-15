@extends ('template')

@section ('content')

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <h1>Welcome, {{ Auth::user()->name }}!</h1>
                    @foreach($reviews as $review)
                        <p> {{ $review->tmdb_id }} </p>
                        <p> {{ $review->user_review }} </p>
                    @endforeach
                @else
                    <h1>Welcome, to MyMovieList!</h1>
                    <h2>Please register or login!</h2>
                @endauth
            </div>
        @endif
    </div>

@endsection


