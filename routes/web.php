<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/person/deletes', [PersonController::class, 'deletes'])->name('person.deletes');
    Route::get('/person/restore/{id}', [PersonController::class, 'restore'])->name('person.restore');
    Route::resource('/person', PersonController::class);
    Route::resource('/contact', ContactController::class);
    Route::resource('/job', JobController::class);
});
