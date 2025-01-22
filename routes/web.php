<?php

use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/google' , function (){
//     return view('auth.google');
// });

Route::get('/auth/google', [GoogleController::class, 'redirectToProvider'])->name('auth.goto');
Route::get('/google/redirect', [GoogleController::class, 'handleProviderCallback'])->name('provider.callback');
// Route::GET('/logout', [GoogleController::class, 'ProviderLogout'])->name('logout');

Route::post('/login', [GoogleController::class, 'basiclogin'])->name('login');
Route::get('/thanks', function () {
    return view('auth.thanks');
})->name('thanks');

Route::post('/logout', [GoogleController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/users', [GoogleController::class, 'Getusers'])->name('Users');