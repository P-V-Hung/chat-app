<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController,
};
use App\Http\Controllers\{
    HomeController,
    UserController,
};
use App\Http\Controllers\CRUD\{
    FriendController,
    MessageController,
};


Route::get('login', [LoginController::class,'showFormLogin'])->name('login');
Route::post('login', [LoginController::class,'login'])->name('login');
Route::match(['get','post'],'logout', [LoginController::class,'logout'])->name('logout');
Route::get('register', [RegisterController::class,'showFormRegister'])->name('register');

Route::middleware('auth')->group(function(){
    Route::get('/', [HomeController::class,'home'])->name('home');
    Route::post('user/change-status',[UserController::class,'changeStatus'])->name('change.online');
    Route::put('user/change-message',[UserController::class,'setMessage'])->name('change.message');
    Route::post('user/change-profile',[UserController::class,'updateProfile'])->name('change.profile');
    Route::post('user/change-socials',[UserController::class,'updateSocials'])->name('change.social');

    Route::resource('friend',FriendController::class);
    Route::resource('message',MessageController::class);
});


Route::get('test',function(){
   $message = \App\Models\Message::find(27);
   $data = $message->load('from_user');
   dd($data);
});
