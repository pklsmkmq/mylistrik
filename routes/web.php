<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    PelangganController,
    TarifController,
    PembayaranController,
    TagihanController
};
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
    return view('auth/login');
})->name('awal');;
Route::get('/login', function () {
    return view('auth/login');
})->name('loginAwal');;
Route::get('/register', function () {
    return view('auth/register');
})->name('regis');;

Route::post('/register', [AuthController::class,'register'])->name('register');
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::group(['auth:sanctum'], function () {
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('layout/dashboardV');
        })->name('dashboard');

        Route::prefix('tarif')->group(function () {
            Route::get('/', [TarifController::class,'index'])->name('tarif');
            Route::get('/add', [TarifController::class,'create'])->name('addTarif');
            Route::get('/edit/{id}', [TarifController::class,'show'])->name('editTarif');
            Route::post('/save', [TarifController::class,'store'])->name('saveTarif');
            Route::put('/update/{id}', [TarifController::class,'update'])->name('updateTarif');
            Route::delete('/delete/{id}', [TarifController::class,'destroy'])->name('deleteTarif');
        });

        Route::get('/pelanggan', [PelangganController::class,'index'])->name('pelanggan');
        Route::get('/pembayaran', [PembayaranController::class,'index'])->name('pembayaran');
    });

    Route::middleware('role:user')->prefix('pelanggan')->group(function () {
        Route::get('/dashboard', [PelangganController::class,'ds'])->name('dashboardUser');

        Route::prefix('profil')->group(function () {
            Route::get('/', [PelangganController::class,'profil'])->name('profil');
            Route::post('/save', [PelangganController::class,'saveProfil'])->name('saveProfil');
        });

        Route::prefix('cekTagihan')->group(function () {
            Route::get('/', [TagihanController::class,'index'])->name('cekTagihan');
            Route::post('/cek', [TagihanController::class,'cek'])->name('cek');
            Route::get('/cekHarga', [TagihanController::class,'bayar'])->name('bayar');
            Route::get('/detailPembayaran', [TagihanController::class,'detailPembayaran'])->name('detailbayar');
        });

        Route::prefix('pembayaran')->group(function () {
            Route::get('/', [PembayaranController::class,'indexUser'])->name('riwayatPembayaran');
        });
    });
});