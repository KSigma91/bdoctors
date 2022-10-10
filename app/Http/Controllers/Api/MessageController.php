<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $email = $data['email'];
        $text = $data['text'];

        $message = new Message;
        $message->user_id = $id;
        $message->message = $text;
        $message->date =  date('Y-m-d');
        $message->email = $email;
        $message->sender_receiver = 'receiver';
        $message->save();

        return response()->json([
            'success'   => true
        ]);
    }
}
