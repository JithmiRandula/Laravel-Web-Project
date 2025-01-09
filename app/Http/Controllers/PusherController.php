<?php

// app/Http/Controllers/PusherController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMessage;

class PusherController extends Controller
{
    // Show the chatbox view
    public function index()
    {
        return view('index');
    }

    // Handle message broadcasting
    public function broadcast(Request $request)
    {
        $message = $request->message;

        // Trigger the Pusher event
        broadcast(new NewMessage($message));

        return response()->json(['status' => 'Message sent']);
    }

    // Receive message (for any additional logic)
    public function receive(Request $request)
    {
        return view('receive', ['message' => $request->get('message')]);
    }
}
