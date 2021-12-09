<?php

use App\Models\Data_user;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\RegisterController;
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
        Route::get('/setoran/add', [TransaksiController::class, 'add_setoran'])->name('add_setoran');
    });






    // Route::get('/profil/edit/{user}', function (App\Models\Data_user $user) {
    //     return view('profil.edit_profil')->with() Data_user::where('id_user', $user)->first();
    // });
});
    

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
