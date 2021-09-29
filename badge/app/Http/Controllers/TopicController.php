<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $topics = Topic::all();

        return view('topics.index', compact('topics'));
    }

    public function new()
    {
        return view('topics.new');
    }

    public function store(Request $request)
    {
        $topic = auth()->user()->topics()->create($request->all());
        return redirect()->route('topic.show', $topic);
    }

    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }
}
