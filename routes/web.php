<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

// Google Oauth
Route::controller(LoginController::class)->group(function() {
    Route::get('/login/google', 'redirectToGoogle')->name('login.google');
    Route::get('/login/google/callback', 'handleGoogleCallback')->name('login.google.callback');
});

// Github Oauth
Route::controller(LoginController::class)->group(function() {
    Route::get('/login/github', 'redirectToGithub')->name('login.github');
    Route::get('/login/github/callback', 'handleGithubCallback')->name('login.github.callback');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');