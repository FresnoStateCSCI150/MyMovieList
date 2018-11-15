@extends ('template')

@section ('content')

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <h1>Welcome, {{ Auth::user()->name }}!</h1>

                    <hr>

                    <div class="container">
                        <div class="row justify-content-center">

                            <div class="col-md">
                                <div class="card">
                                    <h4 class="card-header">{{ __('Your Top 10 Movies') }}</h4>
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="card">
                                    <h4 class="card-header">{{ __('Recommended Movies') }}</h4>
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                @else
                    <h1>Welcome to MyMovieList!</h1>
                    <h2>Please register or login!</h2>
                @endauth
            </div>
        @endif
    </div>

@endsection


