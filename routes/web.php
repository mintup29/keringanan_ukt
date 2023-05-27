<?php

use Illuminate\Support\Facades\Route;

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
    return view('sso');
});
Route::get('/pengajuan', function(){
    return view('user/user1');
});
Route::get('/kuesioner', function(){
    return view('user/kuesioner');
});
Route::get('/navbar1', function(){
    return view('user/template_1'); 
});
Route::get('/navbar2', function(){
    return view('user/template_2'); 
});