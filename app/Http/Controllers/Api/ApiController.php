<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use App\Models\Sampah;
use App\Models\Data_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    
    public function getNasabah($id)
    {
        $query = DB::table('user as a')
        ->select('a.id_user','b.nama_user')
        ->leftJoin('data_user as b', 'a.id_user','=','b.id_user')
        ->where('b.id_relasi_user', $id)
        ->where('a.status','active')
        ->where('a.id_user','!=', $id)
        ->get();

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
   
    
}
