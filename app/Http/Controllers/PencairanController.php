<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PencairanController extends Controller
{
    public function index(){
        return response('00');
    }

    public function nasabah(){
        $cekRole = Role::where('id_role',auth()->user()->id_role)->first();
        if ($cekRole->id_role == 1) {
            $order = Transaksi::select('id_transaksi','nama_banksampah as nama','tanggal','total_nominal',DB::raw('(CASE WHEN id_transaksi is NOT NULL THEN (select sum(bobot) from order_jual where id_transaksi_jual = id_transaksi) ELSE 0 END) AS bobot'),'deskripsi','metode_pembayaran','transaksi.status')
            ->leftJoin('banksampah as b','b.id_user','transaksi.id_user')
            ->where('transaksi.id_user', auth()->user()->id_user)->get();
            ;
            // $order = Order_jual::
            // select('nama_banksampah as nama','tanggal','total_jual','bobot','deskripsi')
            // ->leftJoin('user as a','a.id_user','=','order_jual.id_user')
            // ->leftJoin('banksampah as b','a.id_user','=','b.id_user')
            // ->where('order_jual.id_relasi_user', auth()->user()->id_user)->get();
            
        } else if ($cekRole->id_role == 2) {
            $order = Transaksi::select('id_transaksi','nama_nasabah as nama','tanggal','total_nominal',DB::raw('(CASE WHEN id_transaksi is NOT NULL THEN (select sum(bobot) from order_jual where id_transaksi_jual = id_transaksi) ELSE 0 END) AS bobot'),'deskripsi','metode_pembayaran','transaksi.status')
            ->leftJoin('nasabah as b','b.id_user','transaksi.id_user')
            ->where('transaksi.id_user', auth()->user()->id_user)->get();
            ;
            // $order = Order_jual::
            // select('nama_nasabah as nama','tanggal','total_jual','bobot','deskripsi')
            // ->leftJoin('user as a','a.id_user','=','order_jual.id_user')
            // ->leftJoin('nasabah as b','a.id_user','=','b.id_user')
            // ->where('order_jual.id_relasi_user', auth()->user()->id_user)->get();

        } else {

        }

        // dd($order);

        return view('pencairan/pencairan_nasabah',[
            'title' => 'Pencairan Nasabah',
            'm_pencairan' => 'active',
            'sm_pencairanNasabah' => 'active',
            'user' => auth()->user(),
            'data' => $order
        ]);
    }

    public function pribadi(){
        $cekRole = Role::where('id_role',auth()->user()->id_role)->first();
        if ($cekRole->id_role == 1) {
            $order = Transaksi::select('id_transaksi','nama_banksampah as nama','tanggal','total_nominal',DB::raw('(CASE WHEN id_transaksi is NOT NULL THEN (select sum(bobot) from order_jual where id_transaksi_jual = id_transaksi) ELSE 0 END) AS bobot'),'deskripsi','metode_pembayaran','transaksi.status')
            ->leftJoin('banksampah as b','b.id_user','transaksi.id_user')
            ->where('transaksi.id_user', auth()->user()->id_user)->get();
            ;
            // $order = Order_jual::
            // select('nama_banksampah as nama','tanggal','total_jual','bobot','deskripsi')
            // ->leftJoin('user as a','a.id_user','=','order_jual.id_user')
            // ->leftJoin('banksampah as b','a.id_user','=','b.id_user')
            // ->where('order_jual.id_relasi_user', auth()->user()->id_user)->get();
            
        } else if ($cekRole->id_role == 2) {
            $order = Transaksi::select('id_transaksi','nama_nasabah as nama','tanggal','total_nominal',DB::raw('(CASE WHEN id_transaksi is NOT NULL THEN (select sum(bobot) from order_jual where id_transaksi_jual = id_transaksi) ELSE 0 END) AS bobot'),'deskripsi','metode_pembayaran','transaksi.status')
            ->leftJoin('nasabah as b','b.id_user','transaksi.id_user')
            ->where('transaksi.id_user', auth()->user()->id_user)->get();
            ;
            // $order = Order_jual::
            // select('nama_nasabah as nama','tanggal','total_jual','bobot','deskripsi')
            // ->leftJoin('user as a','a.id_user','=','order_jual.id_user')
            // ->leftJoin('nasabah as b','a.id_user','=','b.id_user')
            // ->where('order_jual.id_relasi_user', auth()->user()->id_user)->get();

        } else {
            $order = Transaksi::select('id_transaksi','nama_nasabah as nama','tanggal','total_nominal',DB::raw('(CASE WHEN id_transaksi is NOT NULL THEN (select sum(bobot) from order_jual where id_transaksi_jual = id_transaksi) ELSE 0 END) AS bobot'),'deskripsi','metode_pembayaran','transaksi.status')
            ->leftJoin('nasabah as b','b.id_user','transaksi.id_user')
            ->where('transaksi.id_user', auth()->user()->id_user)->get();
            ;
            
        }
        return view('pencairan/pencairan_pribadi',[
            'title' => 'Pencairan Dana',
            'm_pencairan' => 'active',
            'sm_pencairanPribadi' => 'active',
            'user' => auth()->user(),
            'data' => $order
        ]);
    }

}
