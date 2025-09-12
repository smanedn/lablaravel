<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [TypeController::class, 'index'])->name('home');
Route::get('/type/{type}', [TypeController::class, 'show'])->name('type.show');

Route::resource('notes', NoteController::class);
