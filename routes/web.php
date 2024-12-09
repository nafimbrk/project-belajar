<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/person/deletes', [PersonController::class, 'deletes'])->name('person.deletes');
Route::get('/person/restore/{id}', [PersonController::class, 'restore'])->name('person.restore');
Route::resource('/person', PersonController::class);