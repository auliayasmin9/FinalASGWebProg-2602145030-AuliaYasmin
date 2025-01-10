<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showMessages($receiverId)
    {
        $receiver = User::findOrFail($receiverId);
        $messages = Message::where(function ($query) use ($receiverId) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($receiverId) {
            $query->where('receiver_id', auth()->id())
                ->where('sender_id', $receiverId);
        })->get();

        return view('messages', compact('receiver', 'messages'));
    }

    public function sendMessage(Request $request, $receiverId)
    {
        $request->validate([
            'message' => 'required|string|max:500', // Validasi input
        ]);

        $receiver = User::findOrFail($receiverId);
        $message = new Message();
        $message->sender_id = auth()->id();
        $message->receiver_id = $receiver->id;
        $message->message = $request->message;
        $message->save();

        return redirect()->route('messages.show', $receiverId);
    }
}
