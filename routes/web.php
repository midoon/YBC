<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\WisatawanController;
use App\Models\Cafe;
use App\Models\Feedback;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    $cafes = Cafe::all();
    return view('dashboard', compact('cafes'));
});

//admin
Route::get('/registration/admin', function(){ return view('register.admin');})->middleware('admin_logged');
Route::post('/registration/admin', [GuestController::class, "doRegister"]);
Route::get('/login/admin', function(){ return view('login.admin');})->middleware('admin_logged');
Route::post('/login/admin', [LoginController::class, "sendAdmin"]);
Route::get("/admin", [CafeController::class, 'index'])->middleware('admin');
Route::post('/logout/admin',[AdminController::class,'doLogout']);
Route::get('/create-cafe', function(){
    return view('admin.create-cafe');
})->middleware('admin');
Route::post('/create-cafe', [CafeController::class, 'create']);
Route::delete('/delete/{id}', [CafeController::class, 'delete']);
Route::get('/show-admin/{id}', [CafeController::class, 'show'])->middleware('admin');
Route::get('/update/{id}', function($id){
    $cafe = Cafe::find($id);
    return view('admin.edit-cafe', compact('cafe'));
})->middleware('admin');
Route::post('/update/{id}', [CafeController::class, 'update']);
Route::get('/create-menu/{idCafe}',[MenuController::class, 'index'])->middleware('admin');
Route::post('/create-menu', [MenuController::class, 'create']);
Route::delete('/delete-menu/{id}/{cafe_id}', [MenuController::class, 'delete']);

//wisatawan
Route::get('/registration/wisatawan', function(){ return view('register.wisatawan');})->middleware('guest');
Route::post('/registration/wisatawan', [GuestController::class, "doRegister"]);
Route::get('/login/wisatawan', function(){ 
    $cafe = Cafe::all();
    return view('login.wisatawan', compact(['cafe']));
})->middleware('guest');
Route::post('/login/wisatawan', [LoginController::class, "sendWisatawan"]);
Route::post('/logout/wisatawan', [WisatawanController::class, 'doLogout']);
Route::get('/show/{id}', function($id){
    $cafe = Cafe::find($id);
    $menus = Menu::where('cafe_id', '=', $id)->get();
    // $feedbacks = Feedback::where('cafe_id', $id)->get();
    $feedbacks = DB::table('feedbacks')->select("feedbacks.*","users.name as name")->join('users', 'users.id', '=', 'feedbacks.user_id')->where('feedbacks.cafe_id', '=', $id)->get();
    return view('show', compact(['cafe', 'menus', 'feedbacks']));
});
Route::get('/add-coment/{cafe_id}/{user_id}', function( $cafe_id, $user_id){
    // dd("test");
    $cafe = Cafe::find($cafe_id);
    return view('add-coment',compact('cafe') ,['user_id'=>$user_id, 'cafe_id'=>$cafe_id]);
})->middleware('auth');
Route::post('/create-feedback', [FeedbackController::class, 'create']);
Route::get('/show-all-coment/{cafe_id}', [FeedbackController::class, 'index']);