@extends ('template')

@section ('content')

    <div class='flex-center position-ref full-height'>
        @if (Route::has('login'))
            <div class='top-right links'>
                @auth
                    @if ($userId == Auth::user()->id)
                        <h1>Welcome, {{ Auth::user()->name }}!</h1>
                    @else
                        <h1>Welcome to {{ \App\User::find($userId)->name }}'s movie reviews</h1>
                    @endif
                    <hr>

                    <div class='container'>

                        <div class='row justify-content-center mb-3'>
                            <div class='col-md'>
                                <div class='card shadow-sm bg-white rounded'>
                                    <h4 class='card-header'>{{ __('Your Top 10 Movies') }}</h4>
                                    <div class='card-body'>
                                        @foreach($reviews as $review)

                                        <div class='container mb-5'>
                                        <div class='row'>
                                        <div class='col-3'>
                                                <img src='http://image.tmdb.org/t/p/w200{{$review->img_path}}'>
                                        </div>

                                        <div class='col-9'>
                                        <table class='table table-bordered'>
                                            <thead>
                                            <tr>
                                                <th scope='col' style='width: 13%'>Movie Title</th>
                                                <th scope='col'>Movie Description</th>
                                                <th scope='col' style='width: 16%'>Movie Release</th>
                                                <th scope='col' style='width: 14%'>TMDB Score</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>{{$review->title}}</td>
                                                <td>{{$review->description}}</td>
                                                <td>{{$review->release}}</td>
                                                <td>{{$review->tmdb_score}}</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <table class='table table-bordered'>
                                            <thead>
                                            <tr>
                                                @if ($userId == Auth::user()->id)
                                                    <th scope='col' style='width: 12%'>My Score</th>
                                                    <th scope='col'>My Review</th>
                                                @else
                                                    <th scope='col' style='width: 12%'>{{ \App\User::find($userId)->name }}'s Score</th>
                                                    <th scope='col'>{{ \App\User::find($userId)->name }}'s Review</th>
                                                @endif
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>{{$review->user_score}}</td>
                                                <td>{{$review->review}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        
                                        @if ($userId == Auth::user()->id)
                                            <button id={{ 'recommend_button_'.$review->movie_review_id }} onclick="showRecommendForm({{ $review->movie_review_id }})" class='btn btn-primary mb-2'>Recommend to a friend</button>
                                            <form class='form-inline' id={{ 'recommend_form_'.$review->movie_review_id }} style='display: none'>
                                                <label class='sr-only' for='recommendee_id'>Name</label>
                                                <select class='custom-select mb-2 mr-sm-2' id={{ 'recommendee_id_'.$review->movie_review_id }} name='recommendee_id' required>
                                                    @foreach ($friends as $friend)
                                                        <option value='{{ $friend->id }}'>{{ $friend->name }}</option>
                                                    @endforeach
                                                </select>
                                                <input value='{{ $review->movie_review_id }}' id='movie_review_id' name='movie_review_id' style='display: none'>

                                                <button type='button' class='btn btn-danger mb-2' onclick="hideRecommendForm({{ $review->movie_review_id }})">Cancel</button>
                                                <button type='button' class='btn btn-primary mb-2 ml-2' onclick="recommendMovie({{ $review->movie_review_id }})">Recommend</button>

                                            </form>
                                            <div id={{ 'recommend_message_'.$review->movie_review_id }}></div>

                                            @include ("fielderrors", ["fieldName" => "recommendee_id"])
                                            @include ("flash-messages/success", ["successVar" => "recommendSuccess"])
                                        @endif
                                        </div>
                                        </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='row justify-content-center mb-3'>
                            <div class='col-md'>
                                <div class='card shadow-sm bg-white rounded'>
                                    <h4 class='card-header'>{{ __('Recommended Movies') }}</h4>
                                    <div class='card-body'>
                                        @foreach($recommends as $recommend)

                                        <div class='container mb-5'>
                                        <div class='row'>
                                        <div class='col-3'>
                                                <img src='http://image.tmdb.org/t/p/w200{{$recommend->img_path}}'>
                                        </div>

                                        <div class='col-9'>
                                        <h5>Recommended by {{ \App\User::find($recommend->recommender_id)->name }}</h5>
                                        <table class='table table-bordered'>
                                            <thead>
                                            <tr>
                                                <th scope='col' style='width: 13%'>Movie Title</th>
                                                <th scope='col'>Movie Description</th>
                                                <th scope='col' style='width: 16%'>Movie Release</th>
                                                <th scope='col' style='width: 14%'>TMDB Score</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>{{$recommend->title}}</td>
                                                <td>{{$recommend->description}}</td>
                                                <td>{{$recommend->release}}</td>
                                                <td>{{$recommend->tmdb_score}}</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <table class='table table-bordered'>
                                            <thead>
                                            <tr>
                                                <th scope='col' style='width: 12%'>{{ \App\User::find($recommend->recommender_id)->name }}'s Score</th>
                                                <th scope='col'>{{ \App\User::find($recommend->recommender_id)->name }}'s Review</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>{{$recommend->user_score}}</td>
                                                <td>{{$recommend->review}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                @else
                    <h1>Welcome to MyMovieList!</h1>
                    <h2>Please register or login!</h2>
                    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                @endauth
            </div>
        @endif
    </div>


    <script type='text/javascript'>
        function showRecommendForm(id) {
            var recommendButton = $('#recommend_button_'+id);
            var recommendForm = $('#recommend_form_'+id);
            recommendButton.hide();
            recommendForm.show();
        };

        function hideRecommendForm(id) {
            var recommendButton = $('#recommend_button_'+id);
            var recommendForm = $('#recommend_form_'+id);
            recommendButton.show();
            recommendForm.hide();
        };

        function recommendMovie(movieReviewId) {
            friendId = parseInt($('#recommendee_id_'+movieReviewId).find(':selected').attr('value'));
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                }
            });
            $.ajax({type: "POST",
                    url: "/recommends/create",
                    data: {
                        "recommendee_id": friendId,
                        "movie_review_id": movieReviewId,
                    },
                    success: function (data) {
                        if (data["success"]) {
                            hideRecommendForm(movieReviewId);
                            $("#recommend_message_" + movieReviewId).append(data["html"]);
                            console.log(data["success"]);
                        }
                        else {
                            $("#recommend_message_" + movieReviewId).append(data["html"]);
                            console.log(data["success"]);
                        }
                    },
                    error: function (errorData) {
                        console.log(errorData);
                    },
                    dataType: "json",
            });
        }
    </script>

@endsection
