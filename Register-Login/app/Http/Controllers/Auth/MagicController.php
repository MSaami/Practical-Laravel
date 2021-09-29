<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\MagicAuthentication;
use App\LoginToken;

class MagicController extends Controller
{

    protected $auth;

    public function __construct(MagicAuthentication $auth)
    {
        $this->middleware('guest');
        $this->auth = $auth;
    }

    public function showMagicForm()
    {
        return view('auth.magic-login');
    }


    public function sendToken(Request $request)
    {
        $this->validateForm($request);
        $this->auth->requestLink();
        return back()->with('magicLinkSent', true);
    }

    public function login(LoginToken $token)
    {
        return $this->auth->authenticate($token) === $this->auth::AUTHENTICATED
            ? redirect()->route('home')
            : redirect()->route('auth.magic.login.form')->with('invalidToken', true);
    }

    protected function validateForm($request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users']
        ]);
    }
}
