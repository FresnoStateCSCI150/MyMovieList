<div class="row justify-content-center mb-3">
    <div class="col-md">
        <div class="card shadow-sm bg-white rounded">
            <h4 class="card-header">{{ __($text) }}</h4>
            <div class="card-body">
                @foreach($reviewsOrRecommends as $review)

                <div class="container mb-5">
                <div class="row">
                <div class="col-3">
                        <img src="http://image.tmdb.org/t/p/w200{{$review->img_path}}">
                </div>

                <div class="col-9">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 13%">Movie Title</th>
                        <th scope="col">Movie Description</th>
                        <th scope="col" style="width: 16%">Movie Release</th>
                        <th scope="col" style="width: 14%">TMDB Score</th>
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

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 12%">My Score</th>
                        <th scope="col">My Review</th>
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
            </div>
        </div>
    </div>
</div>
