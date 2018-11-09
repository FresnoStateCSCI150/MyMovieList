<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;

class FriendRequestUnique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $senderId = Auth::id();
        $receiverId = App\User::where('name', '=', $value)->get()[0]->id;
        $friendRequest = DB::table('friend_requests')->where([
            ['sender_id', '=', $senderId],
            ['receiver_id', '=', $receiverId],
        ])
        ->orWhere([
            ['sender_id', '=', $receiverId],
            ['receiver_id', '=', $senderId],
        ])->get();
        $friendship = DB::table('user_friend')->where('user_id', '=', $senderId)
                                              ->where('friend_id', '=', $receiverId)->get();
        return count($friendRequest) === 0 && count($friendship) === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You or the user specified has already made that friend request or you are already friends with that user.';
    }
}
