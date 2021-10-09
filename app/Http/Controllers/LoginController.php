<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check())
        {
            return redirect()->intended('dashboard');
        } else {
            return view('login');
        }
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);
        

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'loginFail' => 'Email atau password anda salah.',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('login');
    }
}
