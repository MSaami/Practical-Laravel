<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{


    use AuthenticatesUsers;


    protected $redirectTo= '/home';

    public function __construct()
    {
        $this->middleware('guest:web');
        $this->middleware('guest:admin');
    }


    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function register(Request $request)
    {
        $this->validateRegister($request);
        $admin = $this->create($request->all());
        $this->guard()->login($admin);
        return redirect($this->redirectTo);
    }

    private function validateRegister($request)
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'department'=> ['required']
        ]);

    }

    private function create(array $data)
    {

        return Admin::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password' => Hash::make($data['password']),
            'department' => $data['department']
        ]);

    }


    private function guard()
    {
        return Auth::guard('admin');
    }



}
