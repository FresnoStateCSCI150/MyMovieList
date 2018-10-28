@extends ('template')

@section ('content')

	<h2>These are your friends:</h2>
	@if (count($userFriends) > 0)
	<ul>
		@foreach ($userFriends as $friend)
			<li> {{ $friend->name }} </li>
		@endforeach
	</ul>
	@else
		<h3>You have no friends.</h3>
	@endif

@endsection