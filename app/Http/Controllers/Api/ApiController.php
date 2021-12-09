<?php

namespace App\Http\Controllers\Api;

use \Validator;
use App\Models\Role;
use App\Models\User;
use App\Models\Sampah;
use App\Models\Satpel;
use App\Models\Data_user;
use App\Models\BankSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    
    public function getNasabah($id)
    {
        $cekUser = User::where('id_user',$id)->first();
        $role = $cekUser->id_role;
        if ($role == 1) {
            $user = Satpel::select('id_satpel')->where('id_user',$id)->first();

            $query = DB::table('satpel as a')
            ->select('b.id_user','a.nama_satpel as nama_user')
            ->leftJoin('user as b', 'a.id_user','=','b.id_user')
            ->where('a.id_satpel', $user->id_satpel)
            ->where('b.status','active')
            // ->where('b.id_user','!=', $id)
            ->get();
        } else if ($role == 2) {
            $user = BankSampah::select('id_banksampah')->where('id_user',$id)->first();

            $query = DB::table('nasabah as a')
            ->select('b.id_user','a.nama_nasabah as nama_user')
            ->leftJoin('user as b', 'a.id_user','=','b.id_user')
            ->where('a.id_banksampah', $user->id_banksampah)
            ->where('b.status','active')
            // ->where('b.id_user','!=', $id)
            ->get();


        } else {

        }


        $resp = array(
            'status' => 'ok',
            'data' => $query
        );

        return response($resp);
    }

    public function getPrice($id)
    {
        $cekRole = Role::where('id_role',$id)->first();
        if ($cekRole) {
            if ($cekRole->id_role == 1) {
                $query = Sampah::select('id_item','nama_kategori','harga_jual_rt as harga')
                ->orderBy('harga_jual_rt','desc')->get();
            } else if ($cekRole->id_role == 2) {
                $query = Sampah::select('id_item','nama_kategori','harga_jual_warga as harga')
                ->orderBy('harga_jual_warga','desc')->get();
            } else {
                $query = Sampah::get();
            }
            
            $resp = array(
                'status' => 'ok',
                'data' => $query
            );

        } else {
            $resp = array(
                'status' => 'nok',
                'data' => 'permintaan tidak dapat diproses'
            );
        }

        return response($resp);
    }

    public function getSatpel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_satpel' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            $resp = array(
                'status' => 'nok',
                'data' => $validator->errors()->toArray()
            );
        } else {
            
            $data = Satpel::select('id_satpel as id','nama_satpel as text')->where('id_satpel',$request->id_satpel)->first();
            if ($data) {
                $resp = array(
                    'status' => 'ok',
                    'data' => [$data]
                );
            } else {
                $resp = array(
                    'status' => 'nok',
                    'data' => 'permintaan tidak dapat diproses'
                );
            }
        }

        return response($resp);
    }

    public function getBanksampah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_banksampah' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            $resp = array(
                'status' => 'nok',
                'data' => $validator->errors()->toArray()
            );
        } else {
            
            $data = BankSampah::select('id_banksampah as id','nama_banksampah as text')->where('id_banksampah',$request->id_banksampah)->first();
            if ($data) {
                $resp = array(
                    'status' => 'ok',
                    'data' => [$data]
                );
            } else {
                $resp = array(
                    'status' => 'nok',
                    'data' => 'permintaan tidak dapat diproses'
                );
            }
        }

        return response($resp);
    }

    // public function getKategori($id)
    // {
    //     $cekRole = Role::where('id_role',$id)->first();
    //     if ($cekRole) {
    //         if ($cekRole->id_role == 1) {
    //             $query = Sampah::select('id_item','nama_kategori','harga_jual_rt as harga')
    //             ->orderBy('harga_jual_rt','desc')->get();
    //         } else if ($cekRole->id_role == 2) {
    //             $query = Sampah::select('id_item','nama_kategori','harga_jual_warga as harga')
    //             ->orderBy('harga_jual_warga','desc')->get();
    //         } else {
    //             $query = Sampah::get();
    //         }
            
    //         $resp = array(
    //             'status' => 'ok',
    //             'data' => $query
    //         );

    //     } else {
    //         $resp = array(
    //             'status' => 'nok',
    //             'data' => 'permintaan tidak dapat diproses'
    //         );
    //     }

    //     // $validator = Validator::make($request->all(), [
    //     //     'id_banksampah' => 'required|numeric'
    //     // ]);

    //     // if ($validator->fails()) {
    //     //     $resp = array(
    //     //         'status' => 'nok',
    //     //         'data' => $validator->errors()->toArray()
    //     //     );
    //     // } else {
    //     //     $data = BankSampah::select('id_banksampah as id','nama_banksampah as text')->where('id_banksampah',$request->id_banksampah)->first();
    //     //     if ($data) {
    //     //         $resp = array(
    //     //             'status' => 'ok',
    //     //             'data' => [$data]
    //     //         );
    //     //     } else {
    //     //         $resp = array(
    //     //             'status' => 'nok',
    //     //             'data' => 'permintaan tidak dapat diproses'
    //     //         );
    //     //     }
    //     // }

    //     return response($resp);
    // }
   
    
}
