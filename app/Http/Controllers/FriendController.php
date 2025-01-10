<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function addFriend($friendId)
    {
        $friend = User::findOrFail($friendId);
        auth()->user()->addFriend($friend);
        return redirect()->back();
    }

    public function removeFriend($friendId)
    {
        $friend = User::findOrFail($friendId);
        auth()->user()->removeFriend($friend);
        return redirect()->back();
    }
}
