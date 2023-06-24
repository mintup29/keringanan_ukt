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
<<<<<<< HEAD
    
=======
    // Route::get('/kuesioner', [KuesionerController::class, 'index']);
>>>>>>> 187f76fbe0bd05ad0e0cd2a5e41d0b93bd1c99d7
});
Route::get('/kuesioner', [KuesionerController::class, 'index']);

Route::get('/logout', [Authcontroller::class, 'logout'])->name('logout');

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/admin-setting', function(){
        return view('admin/dashboard_admin_setting');
    });
    Route::get('/admin-setting', [PertanyaanController::class, 'index'])->name('admin-setting');
    Route::get('/admin', function(){
        return view('admin/dashboard_admin');
    });
    Route::get('/dashboard-admin', [PengajuanMahasiswaController::class, 'index'])->name('dashboard-admin.index');
    Route::put('/dashboard-admin/{item}/update-action', [PengajuanMahasiswaController::class, 'updateAction'])->name('dashboard-admin.update-action');

    Route::get('items/{id}', [PengajuanMahasiswaController::class, 'show'])->name('items.show');
    
    Route::post('tambah-pertanyaan', [PertanyaanController::class, 'store']);
    Route::get('/setting-jawaban/{id}', [PertanyaanController::class, 'show']);
    
});

Route::middleware(['auth', 'isUser'])->group(function(){
    Route::get('/getPengajuan', [PengajuanMahasiswaController::class, 'index'])->name('getPengajuan');
    Route::get('/pengajuan', [MhsController::class, 'mhsDashboard'])->name('pengajuan');
<<<<<<< HEAD
    
=======
    Route::get('/kuesioner', [KuesionerController::class, 'index'])->name('kuesioner');
    // Route::get('/kuesioner', function(){return view('user.kuesioner');})->name('kuesioner');
>>>>>>> 187f76fbe0bd05ad0e0cd2a5e41d0b93bd1c99d7
    Route::get('/pengajuan_2', function(){
        return view('user/profil');
    });
});
Route::get('/kuesioner', [KuesionerController::class, 'index']);
Route::post('isi-kuesioner', [KuesionerController::class, 'store']);

Route::get('/home', function () {return view('landing-page');})->name('home');
Route::get('/', function () {return view('landing-page');});