<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function create()
    {
        return view('communities.messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required',
        ]);

        Message::create([
            'user_id' => Auth::user()->id,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success','Message Sent Successfully');
    }
}
