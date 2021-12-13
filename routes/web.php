<?php

use App\Models\Data_user;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PencairanController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, function(){
    return view('register');
}])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::group(['middleware' => ['auth']], function(){
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/test', function () {
        return view('layouts.template');
    });

    //Profile
    Route::prefix('/profil')->group(function () {
        Route::get('/', [ProfilController::class, 'index'])->name('profil');
        Route::get('/edit/{user}', [ProfilController::class, 'detail_user'])->name('edit_user');
        Route::post('/edit/{user}', [ProfilController::class, 'update']);
        Route::post('/verifikasi', [ProfilController::class, 'verifikasi_email'])->name('verifikasi_email');
        Route::post('/verifikasi/cek', [ProfilController::class, 'verifikasi_email_cek'])->name('verifikasi_email_cek');
        Route::post('/ubahpass', [ProfilController::class, 'ubah_pass'])->name('ubah_pass');
    });

    //Nasabah
    Route::prefix('/user')->group(function(){
        Route::get('/', [NasabahController::class, 'index'])->name('nasabah');
        Route::get('/add', [NasabahController::class, 'show'])->name('add_nasabah');
        Route::post('/add', [NasabahController::class, 'store'])->name('store_nasabah');
        Route::post('/update', [NasabahController::class, 'update'])->name('edit_nasabah');
        Route::get('/delete/{user}', [NasabahController::class, 'insert'])->name('delete_nasabah');
    });

    // Transaksi
    Route::prefix('/transaksi')->group(function(){
        Route::get('/setoran', [TransaksiController::class, 'index'])->name('terima_setoran');
        Route::get('/setoran/add', [TransaksiController::class, 'view_add_setoran'])->name('view_add_setoran');
        Route::post('/setoran/add', [TransaksiController::class, 'add_setoran'])->name('add_setoran');
        Route::get('/setoran/ubah', [TransaksiController::class, 'view_ubah_setoran'])->name('view_ubah_setoran');
        Route::post('/setoran/ubah', [TransaksiController::class, 'ubah_setoran'])->name('ubah_setoran');
        Route::get('/jual-setoran', [TransaksiController::class, 'view_jual_setoran'])->name('view_jual_setoran');
        Route::get('/jual-setoran/add', [TransaksiController::class, 'add_jualsetoran'])->name('add_jualsetoran');
    });

    // Pencairan
    Route::prefix('/pencairan')->group(function(){
        Route::get('/nasabah', [PencairanController::class, 'nasabah'])->name('pencairan.nasabah');
        Route::get('/pribadi', [PencairanController::class, 'pribadi'])->name('pencairan.pribadi');
    });

    // Pencairan
    Route::prefix('/inventory')->group(function(){
        Route::get('/setoran', [InventoryController::class, 'setoran'])->name('inventory.sampah_setoran');
        Route::get('/item', [InventoryController::class, 'itemList'])->name('inventory.item');
        Route::get('/item/add', [InventoryController::class, 'view_add_item'])->name('inventory.view_add_item');
        Route::post('/item/add', [InventoryController::class, 'add_item'])->name('inventory.add_item');
        Route::get('/item/edit', [InventoryController::class, 'view_edit_item'])->name('inventory.view_edit_item');
        Route::post('/item/edit', [InventoryController::class, 'edit_item'])->name('inventory.edit_item');
        Route::get('/item/delete/{id}', [InventoryController::class, 'itemList'])->name('inventory.add_item');
    });





    // Route::get('/profil/edit/{user}', function (App\Models\Data_user $user) {
    //     return view('profil.edit_profil')->with() Data_user::where('id_user', $user)->first();
    // });
});
    

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
