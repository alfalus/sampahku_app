<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function index(){
        return response(true);
    }

    public function setoran(){

    }

    public function itemList(){
        $cekRole = Role::where('id_role',auth()->user()->id_role)->first();
        if ($cekRole->id_role == 1) {
            $data = Produk::get();
            
        } else if ($cekRole->id_role == 2) {
            $data = Produk::get();

        } 


        return view('inventory/item',[
            'title' => 'List Item',
            'm_inventory' => 'active',
            'sm_daftarItem' => 'active',
            'data' => $data
        ]);
    }

    public function view_add_item(){
        $cekRole = Role::where('id_role',auth()->user()->id_role)->first();
        if ($cekRole->id_role == 1) {
            $data = Produk::get();
            
        } else if ($cekRole->id_role == 2) {
            $data = Produk::get();

        } 


        return view('inventory/add_item',[
            'title' => 'List Item',
            'm_inventory' => 'active',
            'sm_daftarItem' => 'active',
            'data' => $data
        ]);
    }

    public function view_edit_item(){
        $cekRole = Role::where('id_role',auth()->user()->id_role)->first();
        if ($cekRole->id_role == 1) {
            $data = Produk::get();
            
        } else if ($cekRole->id_role == 2) {
            $data = Produk::get();

        } 


        return view('inventory/edit_item',[
            'title' => 'List Item',
            'm_inventory' => 'active',
            'sm_daftarItem' => 'active',
            'data' => $data
        ]);
    }
}
