<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanMahasiswaController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\SettingJawabanController;
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
    // Route::get('/kuesioner', [KuesionerController::class, 'index']);
});

Route::get('/logout', [Authcontroller::class, 'logout'])->name('logout');

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/admin-setting', function(){
        return view('admin/dashboard_admin_setting');
    });
    Route::get('/admin-setting', [PertanyaanController::class, 'index'])->name('admin-setting');
    Route::get('/admin', function(){
        return view('admin/dashboard_admin');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard-admin', [PengajuanMahasiswaController::class, 'index'])->name('dashboard-admin.index');
    Route::get('/dashboard-admin/export', [MhsController::class, 'export'])->name('dashboard-admin.export');
    Route::put('/dashboard-admin/{item}/update-action', [PengajuanMahasiswaController::class, 'updateAction'])->name('dashboard-admin.update-action');

    Route::get('items/{id}', [PengajuanMahasiswaController::class, 'show'])->name('items.show');
    
    Route::post('tambah-pertanyaan', [PertanyaanController::class, 'store']);
    Route::get('/setting-jawaban/{id}', [PertanyaanController::class, 'show']);
    Route::post('admin-setting/delete/{id}', [PertanyaanController::class, 'destroy']);
    Route::post('admin-setting/update/{id}', [PertanyaanController::class, 'update']);
    Route::post('setting-jawaban/delete/{id}', [SettingJawabanController::class, 'destroy']);
    Route::post('tambah-jawaban', [SettingJawabanController::class, 'store']);
    
});

Route::middleware(['auth', 'isUser'])->group(function(){
    Route::get('/getPengajuan', [PengajuanMahasiswaController::class, 'index'])->name('getPengajuan');
    Route::get('/pengajuan', [MhsController::class, 'mhsDashboard'])->name('pengajuan');
    Route::get('/kuesioner', [KuesionerController::class, 'index'])->name('kuesioner');
    // Route::get('/kuesioner', function(){return view('user.kuesioner');})->name('kuesioner');
    Route::get('/pengajuan_2', function(){
        return view('user/profil');
    });
});

Route::get('/home', function () {return view('landing-page');})->name('home');
Route::get('/', function () {return view('landing-page');});
