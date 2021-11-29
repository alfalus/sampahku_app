<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Data_user;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function index(){
        return view('profil/profil',[
            'title' => 'Profil Akun',
            'm_profil' => 'active',
            'data' => Data_user::
                leftJoin('user as b', 'data_user.id_user','=','b.id_user')
                ->leftJoin('role as c', 'c.id_role', '=', 'b.id_role')
                ->where('data_user.id_user', auth()->user()->id_user)
                ->first()
        ]);
    }

    public function detail_user($user){
        if ($user != auth()->user()->id_user) {
            return redirect()->route('profil')->with([
                "response" => "fail",
                'message' => 'Anda tidak dapat melakukan permintaan ini.',
            ]);
        } 

        $user = Data_user::where('id_user', $user)->first();
        // dd (json_encode($user));
        if ($user) {
            $data = $user;
            return view('profil.edit_profil', [
                'title' => 'Edit Akun',
                'm_profil' => 'active',
                'user' => auth()->user(),
                'data' => $data
            ]);
        } else {
            return redirect()->route('profil')->with([
                "response" => "fail",
                'message' => 'Anda tidak dapat melakukan permintaan ini.',
            ]);
        }
    }

    public function update(Request $request, Data_user $d_user, User $user){
        // dd (auth()->user());
        // dd($d_user);
        // dd($user);
        // dd($request->all());

        $validate = Validator::make($request->all(), [
            'role' => 'required|in:1,2,3',
            'nama' => 'required',
            'jabatan' => 'required_if:role,1',
            'instansi' => 'required_if:role,1',
            // 'email' => 'required|email:dns|',
            'no_hp' => 'required',
            'jenis_kel' => 'required|in:L,P',
            'tgl_lahir' => 'nullable',
            'alamat' => 'nullable'
        ]);

        if ($validate->fails()) {
            $response = [
                "response" => "fail",
                "message" => "Error! Periksa kembali inputan anda."
            ];
            // dd(false);

        } else {
            // dd(true);
            try {
                $user = Data_user::
                leftJoin('user','user.id_user','=','data_user.id_user')
                ->where('user.id_user','=', auth()->user()->id_user)
                ->first();
    
                $user->nama_user = $request->nama;
                $user->no_hp = $request->no_hp;
                $user->jenis_kel = $request->jenis_kel;
                $user->ttl = $request->tgl_lahir;
                $user->alamat = $request->alamat;
                if (auth()->user()->id_role == 1) {
                    $user->jabatan = $request->jabatan;
                    $user->nama_instansi = $request->instansi;
                }
    
                $user->save();
                $response = [
                    "response" => "success",
                    "message" => "Data berhasil diupdate."
                ];

            } catch (\Throwable $e) {
                Log::error("Failed to update : " . $e->getMessage());
                // dd($e->getMessage());
                $response = [
                    "response" => "fail",
                    "message" => "Error DB Connection."
                ];
            }
            
        } 
        
        return redirect()->route('profil')->with($response);
    }

}
