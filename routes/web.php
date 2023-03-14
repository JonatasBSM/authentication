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
    return view('welcome');
})->middleware('authenticator');


Route::controller(\App\Http\Controllers\Auth\LoginController::class)->group( function () {

    Route::prefix('login')->group(function () {
        Route::get('/','index')->name('login');
        Route::post('/signIn', 'signIn');
        Route::post('/signOut', 'signOut');
    });

});

Route::controller(\App\Http\Controllers\Auth\RegisterController::class)->group(function () {
    Route::prefix('register')->group(function () {
        Route::get('/', 'index');
        Route::post('/sign-up', 'store');
    });
});

Route::controller(\App\Http\Controllers\Auth\ForgotPasswordController::class)->group(function () {
    Route::prefix('password-recover')->group(function () {
        Route::get('/', 'index');
        Route::post('/reset', 'thanCreate');
        Route::get('/reset/{token}/{email}');
    });
});

