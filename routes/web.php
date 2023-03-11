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
})->middleware(\App\Http\Middleware\Autenticar::class);


Route::controller(\App\Http\Controllers\LoginController::class)->group( function () {
    Route::get('/login','index')->name('login');
    Route::post('/signIn', 'signIn');
    Route::post('/register', 'register');
});

