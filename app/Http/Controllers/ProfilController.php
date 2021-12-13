<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Satpel;
use App\Models\Nasabah;
use App\Models\BankSampah;
use App\Models\Akses_token;
use Illuminate\Http\Request;
use App\Mail\VerifikasiEmail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function index(){
        // dd(auth()->user());

        if (auth()->user()->id_role == 1) {
            $data = Satpel::
            select('nama_satpel as nama_user','satpel.no_hp','satpel.alamat','satpel.status as status','b.email','b.status as active','role')
            ->leftJoin('user as b', 'satpel.id_user','=','b.id_user')
            ->leftJoin('role as c', 'c.id_role', '=', 'b.id_role')
            ->where('satpel.id_user', auth()->user()->id_user)
            ->first();

            // dd($data);
        } elseif (auth()->user()->id_role == 2) {
            $data = BankSampah::
            select('nama_banksampah as nama_user','banksampah.jenis_kel','banksampah.tanggal_lahir','banksampah.no_hp','banksampah.alamat','banksampah.status as status','b.email','b.status as active','role','d.nama_satpel')
            ->leftJoin('user as b', 'banksampah.id_user','=','b.id_user')
            ->leftJoin('role as c', 'c.id_role', '=', 'b.id_role')
            ->leftJoin('satpel as d', 'banksampah.id_satpel', '=', 'd.id_satpel')
            ->where('banksampah.id_user', auth()->user()->id_user)
            ->first();
        } else {
            $data = Nasabah::
            select('nama_nasabah as nama_user','nasabah.jenis_kel','nasabah.tanggal_lahir','nasabah.no_hp','nasabah.alamat','nasabah.status as status','b.email','b.status as active','role','d.nama_banksampah')
            ->leftJoin('user as b', 'nasabah.id_user','=','b.id_user')
            ->leftJoin('role as c', 'c.id_role', '=', 'b.id_role')
            ->leftJoin('banksampah as d', 'nasabah.id_banksampah', '=', 'd.id_banksampah')
            ->where('nasabah.id_user', auth()->user()->id_user)
            ->first();
        }
        
            // dd($data);

        
        return view('profil/profil',[
            'title' => 'Profil Akun',
            'm_profil' => 'active',
            'data' => $data
        ]);
    }

    public function detail_user($user){
        if ($user != auth()->user()->id_user) {
            return redirect()->route('profil')->with([
                "response" => "fail",
                'message' => 'Anda tidak dapat melakukan permintaan ini.',
            ]);
        } 

        $role = User::select('id_role')
        ->where('id_user', $user)->first();

        if ($role->id_role == 1) {
            $user = Satpel::
            select('nama_satpel as nama_user', 'alamat','no_hp')
            ->where('id_user', $user)->first();
        } elseif ($role->id_role == 2) {
            $user = BankSampah::
            select('nama_banksampah as nama_user', 'alamat','no_hp','tanggal_lahir','jenis_kel')
            ->where('id_user', $user)->first();
        } else {
            $user = Nasabah::
            select('nama_nasabah as nama_user', 'alamat','no_hp','tanggal_lahir','jenis_kel')
            ->where('id_user', $user)->first();
        }
        
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

    public function update(Request $request, User $user){
        $messages = [
            'role.required' => 'Anda belum memilih role',
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email harus benar',
            'no_hp.required' => 'No HP harus diisi',
            'jenis_kel.required' => 'Anda belum memilih jenis kelamin',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi',
            'alamat.required' => 'Alamat harus diisi',
        ];

        $validator = Validator::make($request->all(), [
            'role' => 'required|in:1,2,3',
            'nama' => 'required',
            'email' => 'required|email:dns',
            'no_hp' => 'required',
            'jenis_kel' => 'required_unless:role,1|in:L,P',
            'tgl_lahir' => 'required_unless:role,1',
            'alamat' => 'required'
        ], $messages);

        if ($validator->fails()) {
            $error = $validator->errors()->toArray();
            return back()->withErrors($error)->withInput();

        } else {
            $role = $request->role;
            try {
                if ($role == 1) {
                    $dataUser = Satpel::where('id_user', $user->id_user)->first();
                    $dataUser->nama_satpel = $request->nama;

                } elseif ($role == 2) {
                    $dataUser = BankSampah::where('id_user', $user->id_user)->first();
                    $dataUser->nama_banksampah = $request->nama;
                    $dataUser->tanggal_lahir = $request->tgl_lahir;
                    $dataUser->jenis_kel = $request->jenis_kel;
                } else {
                    $dataUser = Nasabah::where('id_user', $user->id_user)->first();
                    $dataUser->nama_nasabah = $request->nama;
                    $dataUser->tanggal_lahir = $request->tgl_lahir;
                    $dataUser->jenis_kel = $request->jenis_kel;
                }
    
                $dataUser->alamat = $request->alamat;
                $dataUser->no_hp = $request->no_hp;
                $dataUser->tanggal_update = Carbon::now();
                $dataUser->save();

                $user->email = $request->email;
                $user->save();
                
                $response = [
                    "response" => "success",
                    "message" => "Data berhasil diperbarui."
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
        
        return back()->with($response);
    }

    public function verifikasi_email(Request $request){
        // return response('ok');
        $data = auth()->user();

        $user = User::where('id_user', $data->id_user)->first();

        $role = $user->id_role;
        $token = random_int(100000, 999999);
        
        if ($role == '2') {
            $detail = BankSampah::where('id_user', $data->id_user)->first();
            $dataEmail['nama'] = $detail->nama_banksampah;
            
        } elseif ($role == '3') {
            $detail = Nasabah::where('id_user', $data->id_user)->first();
            $dataEmail['nama'] = $detail->nama_nasabah;
        }
        
        $dataEmail['email'] = $user->email;
        $dataEmail['kode_verifikasi'] = $token;
        
        try {
            Mail::to(auth()->user())->send(new VerifikasiEmail($dataEmail));
            Log::error("Prepare send email");

            $dataIns = new Akses_token;
            $dataIns->id_user = $user->id_user;
            $dataIns->token = $token;
            $dataIns->tanggal_dibuat = Carbon::now();

            if ($dataIns->save()) {
                $response = [
                    "response" => "success",
                    "message" => "Cek email anda untuk mendapatkan kode verifikasi."
                ];
            } else {
                $response = [
                    "response" => "fail",
                    "message" => "Gagal mengirimkan email."
                ];
            }
            

        } catch (\Throwable $e) {
            Log::error("Failed send email : " . $e->getMessage());
                // dd($e->getMessage());
            $response = [
                "response" => "fail",
                "message" => "Error DB Connection."
            ];
        }

        return response($response);
    }

    public function verifikasi_email_cek(Request $request){
        $messages = [
            'kode.required' => 'Kode harus diisi',
            'kode.digits' => 'Jumlah digit tidak sesuai'
        ];

        $validator = Validator::make($request->all(), [
            'kode' => 'required|digits:6',
        ], $messages);

        if ($validator->fails()) {
            $error = $validator->errors()->toArray();
            return response($error);

        } else {
            $email = auth()->user()->email;
            $data = Akses_token::where('id_user',auth()->user()->id_user)->latest('tanggal_dibuat')->first();
            if ($data->token == $request->kode) {
                $role = auth()->user()->id_role;
                if ($role == '2') {
                    $update = BankSampah::where('id_user',auth()->user()->id_user)->first();
                } elseif ($role == '3') {
                    $update = Nasabah::where('id_user',auth()->user()->id_user)->first();
                }
                $update->status = 'active';
                $update->tanggal_update = Carbon::now();
                $update->save();

                $response = [
                    "response" => "success",
                    "message" => "Email terverifikasi"
                ];
            } else {
                $response = [
                    "response" => "fail",
                    "message" => "Kode verifikasi tidak sesuai."
                ];
            }
        }
        return response($response);
    }

    public function ubah_pass(Request $request){
        $messages = [
            'old_pass.required' => 'Password lama harus diisi',
            'old_pass.min' => 'Password harus minimal :min karakter',
            'new_pass.required' => 'Password baru harus diisi',
            'new_pass.min' => 'Password harus minimal :min karakter',
            'confirm_pass.required' => 'Konfirmasi password harus diisi',
            'confirm_pass.same' => 'Konfirmasi password tidak sama'
        ];

        $validator = Validator::make($request->all(), [
            'old_pass' => 'required|min:5',
            'new_pass' => 'required|min:5',
            'confirm_pass' => 'required|same:new_pass',
        ], $messages);

        if ($validator->fails()) {
            $error = $validator->errors()->toArray();
            return response($error);

        } else {
            // $email = auth()->user()->email;
            // $role = auth()->user()->id_role;
            $user = User::where('id_user',auth()->user()->id_user)->first();
            $oldpass = $request->old_pass;
            $dbpass = $user->password;
            
            if (Hash::check($oldpass, $dbpass)) {
                
                $user->password = bcrypt($request->new_pass);
                $user->tanggal_update = Carbon::now();
                $user->save();

                $response = [
                    "response" => "success",
                    "message" => "Data berhasil diperbarui"
                ];
            } else {
                $response = [
                    "response" => "fail",
                    "message" => "Password lama anda tidak sesuai" 
                ];
            }
        }
        return response($response);
    }
}
