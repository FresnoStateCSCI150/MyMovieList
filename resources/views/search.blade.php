@extends ('template')

@section ('content')

<main class = "py-4">	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('Search') }}</div>

					<div class="card-body">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label text-md-right">{{ __('Search For Movie') }}</label>
							<div class="col-md-6">
								<input type="search" class="form-control" id="search" placeholder="Movie Name">
							</div> 
						</div>

						<div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="searchButton">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>
                        
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="appendSearch" class="container">

	</div>
</main>

<script type="text/javascript">
	$('#searchButton').click(function() {
		var searchMovie = $('#search').val();
		var requestString = "https://api.themoviedb.org/3/search/movie?api_key=547accc678865c1518f69b9f47e2d0a7&language=en-US&query=" + searchMovie + "&page=1";
		$.get(requestString, function(data) {
			console.log(data);
			var obj = data['results'];
			console.log(obj);
			for (var i = 0; i < obj.length; i++) {
				$.each(obj[i], function(key, value) {
					if( key == "title") {
						$("#appendSearch").append("<p>" + value + "</p>");
					}
					if (key == "overview" || key == "poster_path") {
						if (key == "overview") {
							$("#appendSearch").append("<p>Description: " + value + "</p>");
						} else {
							var stringUrl = "http://image.tmdb.org/t/p/w200" + value;
							$("#appendSearch").append("<img src=\"" + stringUrl + "\" alt=\"movie poster\">");
						}
					}
				});
			}
		});
	});
</script>

@endsection