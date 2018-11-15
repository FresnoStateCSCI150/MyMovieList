@extends ('template')

@section ('content')

	<h3>Add a new friend</h3>

	<hr>
	<form class="form-inline" method="POST" action="/friends/createrequest">

		{{ csrf_field() }}

		<label class="sr-only" for="name">Name</label>
		<input type="text" class="form-control mb-2 mr-sm-2" id="name" name="name" placeholder="Name" required>

		<button type="submit" class="btn btn-primary mb-2">Send Friend Request</button>

		@include ("fielderrors", ["fieldName" => "name"])

	</form>

    <hr>
    @if (count($userFriendRequestsReceived) > 0)
	<h3>You have received friend requests from the following users:</h3>

    <hr>
    <form class="form-inline" id="friendRequest" method="POST" action="/friends/create">

        {{ csrf_field() }}

        <label class="sr-only" for="requester_name">Name</label>
        <select class="custom-select mb-2 mr-sm-2" id="requester_name" name="id" required>
            @foreach ($userFriendRequestsReceived as $request)
                <option value="{{ $request->id }}">{{ $request->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary mb-2">Accept Friend Request</button>
        <button type="submit" class="btn btn-primary mb-2 ml-2" onclick="changeToDecline()">Decline Friend Request</button>

        @include ("fielderrors", ["fieldName" => "id"])

    </form>
    <script>
        function changeToDecline() {
            var friendRequestForm = document.getElementById("friendRequest");
            if (friendRequestForm.hasAttribute("action")) {
                friendRequestForm.setAttribute("action", "/friends/declinerequest");
            }
        }
    </script>
    @else
        <h3>You have not received any friend requests</h3>
    @endif

    <hr>
    @if (count($userFriendRequestsSent) > 0)
	<h3>You have sent friend requests to the following users:</h3>

    <hr>
    <form class="form-inline" id="friendRequestSend" method="POST" action="/friends/cancelrequest">

        {{ csrf_field() }}

        <label class="sr-only" for="receiver_name">Name</label>
        <select class="custom-select mb-2 mr-sm-2" id="receiver_name" name="receiver_id" required>
            @foreach ($userFriendRequestsSent as $request)
                <option value="{{ $request->id }}">{{ $request->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary mb-2">Cancel Friend Request</button>

        @include ("fielderrors", ["fieldName" => "receiver_id"])

    </form>
    @else
        <h3>You have not sent out any friend requests</h3>
    @endif

	<hr>

	@if (count($userFriends) > 0)
        <h3>These are your friends:</h3>
        <ul>
            @foreach ($userFriends as $friend)
                <li> {{ $friend->name }} </li>
            @endforeach
        </ul>
	@else
		<h3>You currently have no friends.</h3>
	@endif

    <hr>
    @if (count($userFriends) > 0)
    <h5>You can delete any friend here:</h5>
    <form class="form-inline" method="POST" action="/friends/delete">

        {{ csrf_field() }}

        <label class="sr-only" for="requester_name">Name</label>
        <select class="custom-select mb-2 mr-sm-2" id="requester_name" name="toDeleteId" required>
            @foreach ($userFriends as $friend)
                <option value="{{ $friend->id }}">{{ $friend->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary mb-2">Delete Friend</button>

        @include ("fielderrors", ["fieldName" => "toDeleteId"])

    </form>
    @endif
@endsection
