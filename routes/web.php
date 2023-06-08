<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanMahasiswaController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\MhsController;
use App\Http\Controllers\AuthController;

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

Route::group(['middleware' => 'guest'], function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
Route::get('/login', function(){
    return view('auth/sso');
Route::get('/logout', [Authcontroller::class, 'logout'])->name('logout');

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/admin', function(){return view('admin');})->name('admin');
});

Route::middleware(['auth', 'isUser'])->group(function(){
    Route::get('/pengajuan', [MhsController::class, 'mhsDashboard'])->name('pengajuan');
    Route::get('/kuesioner', function(){return view('user.kuesioner');})->name('kuesioner');
});
Route::get('/pengajuan_2', function(){
    return view('user/user2');
});
// Route::get('/kuesioner', function(){
//     return view('user/kuesioner');   
// });
Route::get('/kuesioner', [KuesionerController::class, 'index']);

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
Route::get('/', function () {return view('landing-page');})->name('home');