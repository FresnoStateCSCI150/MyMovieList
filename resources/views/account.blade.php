@extends ('templates/master')

@section ('content')

	<div class ="container">
		<div class="row">
			<div> 
				<h2> {{ $user->name }}'s Profile </h2>
				<hr>
				<img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

                     <div class="col-md">
                         <div class="card">
                             <div class="card-body">
                             	<form enctype="multipart/form-data" action="/profile" method="POST">
	               					<label>Update Profile Image</label>
	               					<input type="file" name="avatar">
	               					<input type="hidden" name="_token" value="{{ csrf_token() }}">
	               					<input type="submit" class="mt-3 pull-right btn btn-sm btn-primary">
            					</form>
                             </div>
                         </div>
                     </div>
			</div>
		</div>
	</div>

	<hr>
	<div class ="container">
		<div class="row">
			<a class="btn btn-primary" href="/friends" role="button">Friends</a>
		</div>
	</div>

@endsection