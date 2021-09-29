<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function store(Request $request, Topic $topic)
    {
        $topic->replies()->create([
            'user_id' => auth()->user()->id,
            'text'=> $request->text
        ]);

        return back();
    }
}

