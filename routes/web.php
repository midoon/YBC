<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});

//admin
Route::get('/registration/admin', function(){ return view('register.admin');});
Route::post('/registration/admin', [GuestController::class, "doRegister"]);
Route::get('/login/admin', function(){ return view('login.admin');});
Route::post('/login/admin', [LoginController::class, "sendAdmin"]);
Route::get("/admin", function(){
    return view('admin.dashboard');
});

//wisatawan
Route::get('/registration/wisatawan', function(){ return view('register.wisatawan');});
Route::post('/registration/wisatawan', [GuestController::class, "doRegister"]);
Route::get('/login/wisatawan', function(){ return view('login.wisatawan');});
Route::post('/login/wisatawan', [LoginController::class, "sendWisatawan"]);