<?php

namespace App\Http\Controllers;

use Session;
use \Validator;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Nasabah;
use App\Models\BankSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function register(Request $request){
        // dd($request->all());
        $messages = [
            'role.required' => 'Anda belum memilih role',
            'fullname.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email harus benar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal :min karakter',
            'cpassword.required' => 'Konfirmasi password harus diisi',
            'cpassword.same' => 'Konfirmasi password tidak sama',
            'jenis_kel.required' => 'Anda belum memilih jenis kelamin',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi',
            'no_hp.required' => 'No HP harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'id_banksampah.required_if' => 'Mohon kode id bank sampah harus diisi',
            'id_satpel.required_if' => 'Mohon kode id satpel harus diisi',
        ];

        $validator = Validator::make($request->all(), [
            'role' => 'required|in:2,3',
            'fullname' => 'required',
            'email' => 'required|email:dns|unique:user,email',
            'password' => 'required|min:5',
            'cpassword' => 'required|same:password',
            'jenis_kel' => 'required|in:L,P',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'id_banksampah' => 'required_if:role,3',
            'id_satpel' => 'required_if:role,2'
        ], $messages);

        if ($validator->fails()) {
            $error = $validator->errors()->toArray();
            // dd($validator->errors()->toArray());
            return back()->withErrors($error)->withInput();
            
        } else {

            try {
                $user = new User;
                $user->id_role = $request->role;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->tanggal_dibuat = Carbon::now();
                $user->status = 'active';
                $user->save();

                $role = $request->role;
                if ($role == '2') { //banksampah
                    $detail = new BankSampah;
                    $detail->id_user = $user->id_user;
                    $detail->id_satpel = $request->id_satpel;
                    $detail->nama_banksampah = $request->fullname;
                    $detail->alamat = $request->alamat;
                    $detail->no_hp = $request->no_hp;
                    $detail->jenis_kel = $request->jenis_kel;
                    $detail->tanggal_lahir = $request->tgl_lahir;
                    $detail->tanggal_update = Carbon::now();
                    $detail->status = 'waiting confirmation';
                    $detail->save();
                    $msg = "Akun bank sampah berhasil dibuat";

                } elseif ($role == '3') { //warga
                    $detail = new Nasabah;
                    $detail->id_user = $user->id_user;
                    $detail->id_banksampah = $request->id_banksampah;
                    $detail->nama_nasabah = $request->fullname;
                    $detail->alamat = $request->alamat;
                    $detail->no_hp = $request->no_hp;
                    $detail->jenis_kel = $request->jenis_kel;
                    $detail->tanggal_lahir = $request->tgl_lahir;
                    $detail->tanggal_update = Carbon::now();
                    $detail->status = 'waiting confirmation';
                    $detail->save();
                    $msg = "Akun nasabah berhasil dibuat";
                } 

            } catch (\Throwable $e) {
                Log::error("Failed to update : " . $e->getMessage());
                // dd($e->getMessage());
                $response = [
                    "response" => "fail",
                    "message" => "Error DB Connection"
                ];
                return back()->withErrors($response)->withInput();
            }

        }

        return back()->with('success', $msg);

    }

}
