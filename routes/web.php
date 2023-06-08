<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/logout', [Authcontroller::class, 'logout'])->name('logout');

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/admin', function(){return view('admin');})->name('admin');
});

Route::middleware(['auth', 'isUser'])->group(function(){
    Route::get('/pengajuan', [MhsController::class, 'mhsDashboard'])->name('pengajuan');
    Route::get('/kuesioner', function(){return view('user.kuesioner');})->name('kuesioner');
});
Route::get('/', function () {return view('landing-page');})->name('home');
