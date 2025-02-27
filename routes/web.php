<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;

Route::middleware('auth')->group(function () {
    Route::resource('songs', SongController::class)->except(['index']);

    Route::controller(SongController::class)->group(function () {
        Route::get('/', 'index')->name('songs.index');

        Route::middleware('throttle:5,1')->group(function () {
            Route::post('/songs/{song}/pdf', 'pdf')->name('songs.pdf');
            Route::post('/songs/{song}/docx', 'docx')->name('songs.docx');
        });
    });
});

require __DIR__ . '/./auth.php';
