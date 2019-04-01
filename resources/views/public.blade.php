@extends ('templates/master')

@section ('content')

    <div class='flex-center position-ref full-height'>
        <div class='top-right links'>
            @auth
                <div class='container'>
                    <div class='row justify-content-between mb-3'>
                        <div class='col-10'>
                            <h1>{{ $publicUser = \App\User::find($userId)->name}}'s public profile.</h1>
                        </div>
                        <div class='col-2'>

                            {{-- need to add ability to check if already friend --}}

                            {{-- {{ Auth::user()->friends()->get() }} --}}
                            {{-- {{ \App\User::find($userId) }} --}}
                            {{-- if current user's friend_id == public user's user_id --}}
                            {{-- then they are friends --}}

                            <form method="POST" action="/friends/createrequest">

                                {{ csrf_field() }}

                                <input type="hidden" id="name" name="name" value="{{ $publicUser }}">
                                <button type="submit" class="btn btn-primary mb-2">Send Friend Request</button>

                                @include ("errors/fielderrors", ["fieldName" => "name"])
                                @include ("flash-messages/success", ["successVar" => "requestSuccess"])

                            </form>

                        </div>
                    </div>
                </div>

                <hr>

                <div class='container'>

                    <div class='row justify-content-center mb-3'>
                        <div class='col-md'>
                            <div class='card shadow-sm bg-white rounded'>
                                <h4 class='card-header'>{{ \App\User::find($userId)->name }}'s Reviewed Movies</h4>
                                <div class='card-body'>

                                    @if(count($reviews))
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
                                            <th scope='col' style='width: 12%'>{{ \App\User::find($userId)->name }}'s Score</th>
                                            <th scope='col'>{{ \App\User::find($userId)->name }}'s Review</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>{{$review->user_score}}</td>
                                            <td>{{$review->review}}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    </div>
                                    </div>
                                    </div>
                                    @endforeach
                                    @else
                                        <h6>No reviewed movies.</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- if the user has no reviews and no recommends, display hint --}}
                    <div class='row justify-content-center mt-4'>
                        <div class='col-md'>
                            @if(count($reviews) == 0)
                                <h3>This user has no reviews.</h3>
                                {{-- @if($friends->id) --}}
                                {{--     <h3>Recommend your friend some movies. 😊</h3> --}}
                                {{-- @else --}}
                                {{--     <h3>Add them as a friend to recommend them movies. 😊</h3> --}}
                                {{-- @endif --}}
                            @endif
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>

@endsection
