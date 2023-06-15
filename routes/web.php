<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanMahasiswaController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\KuesionerController;

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
    // Route::get('/kuesioner', [KuesionerController::class, 'index']);
});

Route::get('/logout', [Authcontroller::class, 'logout'])->name('logout');

Route::get('/admin-setting', function(){
    return view('admin/dashboard_admin_setting');
});

Route::get('/admin-setting', [PertanyaanController::class, 'index']);

Route::post('tambah-pertanyaan', [PertanyaanController::class, 'store']);

Route::get('/setting-jawaban/{id}', [PertanyaanController::class, 'show']);

Route::get('/admin', function(){
    return view('admin/dashboard_admin');
});

Route::middleware(['auth', 'isUser'])->group(function(){
    Route::get('/getPengajuan', [PengajuanMahasiswaController::class, 'index'])->name('getPengajuan');
    Route::get('/pengajuan', [MhsController::class, 'mhsDashboard'])->name('pengajuan');
    Route::get('/kuesioner', function(){return view('user.kuesioner');})->name('kuesioner');
    Route::get('/pengajuan_2', function(){
        return view('user/profil');
    });
});

Route::get('/home', function () {return view('landing-page');})->name('home');
Route::get('/', function () {return view('landing-page');});
