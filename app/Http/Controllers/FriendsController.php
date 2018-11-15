<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\FriendRequestUnique;
use App;
use App\Rules\FriendRequestExists;
use App\Rules\FriendshipExists;

class FriendsController extends Controller
{
	public function createFriendRequest()
	{
        $this->validate(request(), [
            'name' => 'exists:users'
        ]);
        $this->validate(request(), [
            'name' => new FriendRequestUnique
        ]);

        $sender = Auth::user();
        $receiverId = App\User::where('name', '=', request('name'))->get()[0]->id;

        // Create a new friend request
        $sender->friendRequestsSent()->attach($receiverId);

        return redirect()->route('friends');
    }

    public function cancelFriendRequest()
    {
        return $this->deleteFriendRequest("sender");
    }

    public function declineFriendRequest()
    {
        return $this->deleteFriendRequest("receiver");
    }

    public function createFriendship()
    {
        $this->validate(request(), [
            'id' => new FriendRequestExists("receiver"),
        ]);

        $receiver = Auth::user();
        $sender = App\User::find((int)request('id'));

        $sender->friends()->attach($receiver->id);
        $receiver->friends()->attach($sender->id);
        $sender->friendRequestsSent()->detach($receiver->id);

        return redirect()->route('friends');
    }

    public function deleteFriendRequest(String $userType)
    {
        if ($userType == "receiver") {
            $name = "id";
        }
        else if ($userType == "sender") {
            $name = "receiver_id";
        }
        $this->validate(request(), [
            $name => new FriendRequestExists($userType),
        ]);

        if ($userType == "receiver") {
            $sender = App\User::find((int)request($name));
            $receiver = Auth::user();
        }
        else if ($userType == "sender") {
            $sender = Auth::user();
            $receiver = App\User::find((int)request($name));
        }

        $sender->friendRequestsSent()->detach($receiver->id);

        return redirect()->route('friends');
    }

    public function deleteFriendship()
    {
        $this->validate(request(), [
            'toDeleteId' => new FriendshipExists,
        ]);

        $deleter = Auth::user();
        $deletee = App\User::find((int)request('toDeleteId'));

        $deleter->friends()->detach($deletee->id);
        $deletee->friends()->detach($deleter->id);

        return redirect()->route('friends');
    }

	// Return a page which shows a list of the logged in user's friends.
	public function friends()
	{
		$user = Auth::user();
        $userFriends = $user->friends()->get();
        $userFriendRequestsReceived = $user->friendRequestsReceived()->get();
        $userFriendRequestsSent = $user->friendRequestsSent()->get();

		return view('friends', compact('userFriends', 'userFriendRequestsReceived', 'userFriendRequestsSent'));
    }
}
