<?php

namespace App\Http\Controllers;

use App\Models\Satpel;
use App\Models\Nasabah;
use App\Models\BankSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()) {
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
            $id_user = auth()->user()->id_user;
            $role = auth()->user()->id_role;
            $request->session()->regenerate();
            if ($role==1) {
                $user = Satpel::where('id_user',$id_user)->first();
                $request->session()->put('nama', $user->nama_satpel);
            } elseif ($role==2) {
                $user = BankSampah::where('id_user',$id_user)->first();
                $request->session()->put('nama', $user->nama_banksampah);
            } else {
                $user = Nasabah::where('id_user',$id_user)->first();
                $request->session()->put('nama', $user->nama_nasabah);
            } 

            // session(['test' => 'asdasdas']);
            return redirect()->intended('profil');
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
