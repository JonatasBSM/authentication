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
        Route::post('/sign-up', 'signUp');
    });
});

Route::controller(\App\Http\Controllers\ConffirmAccountController::class)->group(function () {
    Route::prefix('conffirm-account')->group(function () {
        Route::get('/{token}/{email}','index')->name('conffirmAccount');
    });
});

Route::controller(\App\Http\Controllers\Auth\ForgotPasswordController::class)->group(function () {
    Route::prefix('forgot-password')->group(function () {
        Route::get('/', 'index');
        Route::put('/send-email', 'sendEmail');
    });
});

Route::controller(\App\Http\Controllers\Auth\ResetPasswordController::class)->group(function () {
    Route::prefix('reset-password')->group(function () {
        Route::get('/{token}/{email}', 'index',[
                'nocsrf' => true
            ])->name('resetPassword');
        Route::put('/update/', 'update');
    });
});
