<?php

namespace App\Http\Controllers;

use App\Badge;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function new()
    {
        return view('badges.new');
    }


    public function store(Request $request)
    {
        Badge::create($request->all());
        return back();
    }

}
