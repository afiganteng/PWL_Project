<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ServisMotorController;
use App\Http\Controllers\UserBiasaController;
use App\Http\Controllers\UserPelangganController;
use App\Http\Controllers\UserServisMotorController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [HomeController::class, 'user']);

Route::get('logout', [Auth::class, 'logout'], function () {
    return abort(404);
});

Route::resource('mekanik', MekanikController::class)->middleware('auth');
Route::resource('sparepart', SparepartController::class)->middleware('auth');
Route::resource('pelanggan', PelangganController::class)->middleware('auth');
Route::resource('servismotor', ServisMotorController::class)->middleware('auth');
Route::get('servismotor/cetak_pdf/{servis_motor}', [ServisMotorController::class, 'cetak_pdf'])->name('servismotor.cetak_pdf');

Route::prefix('user_biasa')->middleware('auth')->group(function(){
    Route::get('/mekanik', [UserBiasaController::class, 'mekanik'])->name('user_biasa.mekanik');
    Route::get('/sparepart', [UserBiasaController::class, 'sparepart'])->name('user_biasa.sparepart');
});

Route::resource('user_pelanggan', UserPelangganController::class)->middleware('auth');
Route::resource('user_servismotor', UserServisMotorController::class)->middleware('auth');