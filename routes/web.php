<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('person', [PersonController::class, 'index'])->name('person.index');
Route::get('person/show/{id}', [PersonController::class, 'show'])->name('person.show');
Route::get('person/create', [PersonController::class, 'create'])->name('person.create');
Route::post('persons', [PersonController::class, 'store'])->name('person.store');
Route::get('person/edit/{id}', [PersonController::class, 'edit'])->name('person.edit');
Route::put('person/update/{id}', [PersonController::class, 'update'])->name('person.update');
Route::delete('persons/{id}', [PersonController::class, 'destroy'])->name('person.destroy');
Route::get('/person/deletes', [PersonController::class, 'deletes'])->name('person.deletes');
Route::post('/person/restore/{id}', [PersonController::class, 'restore'])->name('person.restore');