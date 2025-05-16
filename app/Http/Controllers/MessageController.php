<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\BroadcastMessage;

class MessageController extends Controller
{
    
    public function send()
    {
        BroadcastMessage::dispatch('chat.general', [
            'user' => 'Admin',
            'message' => 'Hello from Horizon!',
        ]);

        return response()->json(['status' => 'Message queued for broadcast']);
    }
}
