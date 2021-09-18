<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('id','DESC')->get();
        return view('admin.messages.index',compact('messages'));
    }

    public function show($id)
    {
        $showMessage = Message::where('id',$id)->orderBy('id','DESC')->get();

        return json_encode($showMessage);
    }
}
