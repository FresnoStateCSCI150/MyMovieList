<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendshipExists implements Rule
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
        $userId = (int)$value;
        $friendId = Auth::id();
        $friendship = DB::table('user_friend')->where('user_id', '=', $userId)
                                              ->where('friend_id', '=', $friendId)->get();
        return count($friendship) > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You are not friends with this user.';
    }
}
