<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;

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
