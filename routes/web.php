<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanMahasiswaController;
use App\Http\Controllers\PertanyaanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing-page');
});
Route::get('/login', function(){
    return view('auth/sso');
});
Route::get('/pengajuan', function(){
    return view('user/user1');
});
Route::get('/pengajuan_2', function(){
    return view('user/user2');
});
Route::get('/kuesioner', function(){
    return view('user/kuesioner');
});

Route::get('/admin-setting', function(){
    return view('admin/dashboard_admin_setting');
});

Route::get('/admin-setting', [PertanyaanController::class, 'index']);

Route::post('tambah-pertanyaan', [PertanyaanController::class, 'store']);

Route::get('/setting-jawaban/{id}', [PertanyaanController::class, 'show']);

Route::get('/admin', function(){
    return view('admin/dashboard_admin');
});

Route::get('/dashboard-admin', [PengajuanMahasiswaController::class, 'index'])->name('pengajuan.index');
Route::put('/dashboard-admin/{item}/update-action', [PengajuanMahasiswaController::class, 'updateAction'])->name('pengajuan.update-action');

Route::get('/getPengajuan', [\App\Http\Controllers\PengajuanMahasiswaController::class, 'index'])->name('getPengajuan');
