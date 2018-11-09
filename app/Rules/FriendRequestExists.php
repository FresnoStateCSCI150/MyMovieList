<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendRequestExists implements Rule
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
        $senderId = (int)$value;
        $receiverId = Auth::id();
        $friendRequest = DB::table('friend_requests')->where('sender_id', '=', $senderId)
                                                     ->where('receiver_id', '=', $receiverId)->get();
        return count($friendRequest) > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'That user didn\'t send you a friend request.';
    }
}
