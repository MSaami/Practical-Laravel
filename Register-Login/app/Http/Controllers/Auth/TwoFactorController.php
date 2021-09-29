<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\TwoFactorAuthentication;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Code;

class TwoFactorController extends Controller
{
    protected $twoFactor;

    public function __construct(TwoFactorAuthentication $twoFactor)
    {
        $this->middleware('auth')->except('resent');
        $this->twoFactor = $twoFactor;
    }


    public function showToggleForm()
    {
        return view('auth.two-factor.toggle');
    }


    public function showEnterCodeForm()
    {
        return view('auth.two-factor.enter-code');
    }


    public function activate()
    {
        $response = $this->twoFactor->requestCode(Auth::user());

        return $response === $this->twoFactor::CODE_SENT
            ? redirect()->route('auth.two.factor.code.form')
            : back()->with('cantSendCode', true);
    }


    public function resent()
    {
        $this->twoFactor->resent();

        return back()->with('codeResent', true);
    }


    public function confirmCode(Code $request)
    {
        $this->validateForm($request);
        $response = $this->twoFactor->activate();

        return $response === $this->twoFactor::ACTIVATED
            ? redirect()->route('home')->with('twoFactorActivated', true)
            : back()->with('invalidCode', true);
    }




    public function deactivate()
    {
        $this->twoFactor->deactivate(Auth::user());

        return back()->with('twoFactorDeactivated', true);
    }
}
