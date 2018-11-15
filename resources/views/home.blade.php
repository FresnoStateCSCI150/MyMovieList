@extends ('template')

@section ('content')

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <h1>Welcome, {{ Auth::user()->name }}!</h1>
                    <div class="mx-auto" style="width: 200px;"><h2><u>Your Reviews</u></h2></div>
                    <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">My Score</th>
                                    <th scope="col"></th>
                                    <th scope="col">Movie Title</th>
                                    <th scope="col">Movie Description</th>
                                    <th scope="col">Movie Release</th>
                                    <th scope="col">TMDB Score</th>
                                    <th scope="col">My Review</th>
                                </tr>
                            </thead>
                            <tbody>
                    @foreach($reviews as $review)
                                <tr>
                                    <td>{{$review->user_score}}</td>
                                    <td><img src="http://image.tmdb.org/t/p/w200{{$review->img_path}}"></td>
                                    <td>{{$review->title}}</td>
                                    <td>{{$review->description}}</td>
                                    <td>{{$review->release}}</td>
                                    <td>{{$review->tmdb_score}}</td>
                                    <td>{{$review->review}}</td>
                                </tr>
                    @endforeach
                        </tbody>
                        </table>
                @else
                    <h1>Welcome, to MyMovieList!</h1>
                    <h2>Please register or login!</h2>
                @endauth
            </div>
        @endif
    </div>

@endsection


