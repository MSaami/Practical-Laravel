<?php

namespace App\Http\Controllers;

use App\Events\ReplyCreated;
use App\Ticket;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }


    public function create(Ticket $ticket, Request $request)
    {
        $reply = auth()->user()->replies()->create([
            'text'=> $request->text,
            'ticket_id'=> $ticket->id
        ]);
        event(new ReplyCreated($reply, auth()->user()));
        return back();
    }
}
