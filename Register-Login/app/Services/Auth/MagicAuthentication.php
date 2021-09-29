<?php

namespace App\Services\Auth;

use App\User;
use Illuminate\Http\Request;
use App\LoginToken;
use Illuminate\Support\Facades\Auth;

class MagicAuthentication
{
    const INVALID_TOKE = 'token.invalid';
    const AUTHENTICATED = 'authenticated';

    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function requestLink()
    {
        $user = $this->getUser();

        $user->createToken()->send([
            'remember' => $this->request->has('remember'),
        ]);
    }


    public function authenticate(LoginToken $token)
    {
        $token->delete();

        if ($token->isExpired()) {
            return self::INVALID_TOKE;
        }

        Auth::login($token->user, $this->request->query('remember'));

        return self::AUTHENTICATED;
    }


    protected function getUser()
    {
        return User::where('email', $this->request->email)->firstOrFail();
    }
}
