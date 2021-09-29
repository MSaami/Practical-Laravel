<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;
use League\OAuth1\Client\Server\Tumblr;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    // use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'send');
    }


    public function send()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('home');
        }
        Auth::user()->sendEmailVerificationNotification();
        return back()->with('verificationEmailSent', true);
    }


    public function verify(Request $request)
    {
        if ($request->user()->email !== $request->query('email')) {
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('home');
        }

        $request->user()->markEmailAsVerified();

        session()->forget('mustVerifyEmail');


        return redirect()->route('home')->with('emailHasVerified', true);
    }
}
