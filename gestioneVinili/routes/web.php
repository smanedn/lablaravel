<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\VinylController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [VinylController::class, 'index'])->name('home');
Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');

Route::resource('vinyls', VinylController::class);

