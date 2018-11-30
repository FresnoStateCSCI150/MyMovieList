@extends ('template')

@section ('content')

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    @if ($userId == Auth::user()->id)
                        <h1>Welcome, {{ Auth::user()->name }}!</h1>
                    @else
                        <h1>Welcome to {{ \App\User::find($userId)->name }}'s movie reviews</h1>
                    @endif
                    <hr>

                    <div class="container">
                        @include('reviews-table', ['reviewsOrRecommends' => $reviews, 'text' => 'Your Top 10 Movies'])
                        @include('reviews-table', ['reviewsOrRecommends' => $recommends, 'text' => 'Recommended Movies'])
                    </div>


                @else
                    <h1>Welcome to MyMovieList!</h1>
                    <h2>Please register or login!</h2>
                @endauth
            </div>
        @endif
    </div>

@endsection


