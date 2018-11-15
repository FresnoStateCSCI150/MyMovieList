<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendRequestExists implements Rule
{
    private $userType;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($userType)
    {
        $this->userType = $userType;
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
        if ($this->userType == "receiver") {
            $senderId = (int)$value;
            $receiverId = Auth::id();
        }
        else if ($this->userType == "sender") {
            $senderId = Auth::id();
            $receiverId = (int)$value;
        }
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
        if ($this->userType == "receiver") {
            return 'That user didn\'t send you a friend request.';
        }
        else if ($this->userType == "sender") {
            return 'You didn\'t send that user a friend request.';
        }
    }
}
