<?php

use App\Http\Controllers\DataKlubContoller;
use App\Http\Controllers\PertandinganController;
use App\Http\Controllers\KlasemenController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DataKlubContoller::class, 'index'])->name('data-klub');
Route::post('/tambah-klub', [DataKlubContoller::class, 'store'])->name('tambah-klub');

Route::get('/pertandingan/tambah-satu', [PertandinganController::class, 'create'])->name('pertandingan-tambah-satu');
Route::get('/pertandingan/tambah-satu/get-klub-tamu/{id}', [PertandinganController::class, 'getKlubTamu'])->name('pertandingan-tambah-satu-get-klub-tamu');
Route::post('/pertandingan/tambah-satu', [PertandinganController::class, 'store'])->name('pertandingan-tambah-satu-simpan');
Route::get('/pertandingan/tambah-banyak', [PertandinganController::class, 'createMultiple'])->name('pertandingan-tambah-banyak');
Route::post('/pertandingan/tambah-banyak', [PertandinganController::class, 'storeMultiple'])->name('pertandingan-tambah-banyak-simpan');

Route::get('/klasemen', [KlasemenController::class, 'index'])->name('klasemen');
