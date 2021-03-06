<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\LahanController;


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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

// Route::group(['middleware' => ['web', 'auth']], function () {
//     Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });

// ########## WEB GIS TANAMAN PANGAN ########## //
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
Route::get('/', [BerandaController::class, 'index'])->name('home');
Route::get('/home/detail/{id_kecamatan}', [BerandaController::class, 'detail']);

Route::get('/home/lahan_detail/{id_lahan}', [BerandaController::class, 'lahan_detail']);
Route::get('/home', [DashboardController::class, 'index'])->name('home');

Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');
Route::get('/kecamatan/add', [KecamatanController::class, 'add']);
Route::post('/kecamatan/insert', [KecamatanController::class, 'insert']);
Route::get('/kecamatan/edit/{id_kecamatan}', [KecamatanController::class, 'edit']);
Route::post('/kecamatan/update/{id_kecamatan}', [KecamatanController::class, 'update']);
Route::get('/kecamatan/delete/{id_kecamatan}', [KecamatanController::class, 'delete']);

Route::get('/kelurahan', [KelurahanController::class, 'index'])->name('kelurahan');
Route::get('/kelurahan/add', [KelurahanController::class, 'add']);
Route::post('/kelurahan/insert', [KelurahanController::class, 'insert']);
Route::get('/kelurahan/edit/{id_kelurahan}', [KelurahanController::class, 'edit']);
Route::post('/kelurahan/update/{id_kelurahan}', [KelurahanController::class, 'update']);
Route::get('/kelurahan/delete/{id_kelurahan}', [KelurahanController::class, 'delete']);
Route::get('/kelurahan/ajaxData', [KelurahanController::class, 'ajaxData'])->name('kelurahan.ajaxData');

Route::get('/tanaman', [TanamanController::class, 'index'])->name('tanaman');
Route::get('/tanaman/add', [TanamanController::class, 'add']);
Route::post('/tanaman/store', [TanamanController::class, 'store']);
Route::get('/tanaman/delete/{id_tanaman}', [TanamanController::class, 'deleteData']);
Route::get('/tanaman/edit/{id_tanaman}', [TanamanController::class, 'detail']);
Route::post('/tanaman/update/{id_tanaman}', [TanamanController::class, 'update']);

Route::get('/lahan', [LahanController::class, 'index'])->name('lahan');
Route::get('/lahan/add', [LahanController::class, 'add']);
Route::post('/lahan/insert', [LahanController::class, 'insert']);
Route::get('/lahan/edit/{id_lahan}', [LahanController::class, 'edit']);
Route::post('/lahan/update/{id_lahan}', [LahanController::class, 'update']);
Route::get('/lahan/delete/{id_lahan}', [LahanController::class, 'delete']);
Route::get('/lahan/detail/{id_lahan}', [LahanController::class, 'detail']);
