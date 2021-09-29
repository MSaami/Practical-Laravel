<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with(['user'])->latest()->take(20)->get();

        return response()->json($messages, 200);
    }


    public function store(Request $request)
    {

        $message = auth()->user()->messages()->create([
            'body'=> $request->body
        ]);

        broadcast(new MessageCreated($message))->toOthers();

        return response()->json($message, 200);
    }
}
