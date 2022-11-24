<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WisatawanController;
use App\Models\Cafe;
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
Route::get('/registration/admin', function(){ return view('register.admin');})->middleware('admin_logged');
Route::post('/registration/admin', [GuestController::class, "doRegister"]);
Route::get('/login/admin', function(){ return view('login.admin');})->middleware('admin_logged');
Route::post('/login/admin', [LoginController::class, "sendAdmin"]);
Route::get("/admin", [CafeController::class, 'index'])->middleware('admin');
Route::post('/logout/admin',[AdminController::class,'doLogout']);

//wisatawan
Route::get('/registration/wisatawan', function(){ return view('register.wisatawan');})->middleware('guest');
Route::post('/registration/wisatawan', [GuestController::class, "doRegister"]);
Route::get('/login/wisatawan', function(){ 
    $cafe = Cafe::all();
    return view('login.wisatawan', compact(['cafe']));
})->middleware('guest');
Route::post('/login/wisatawan', [LoginController::class, "sendWisatawan"]);
Route::post('/logout/wisatawan', [WisatawanController::class, 'doLogout']);