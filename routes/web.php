<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'verified'], function () {

    Route::get('/', [AppController::class, 'index'])->name('app');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/project/{id}', [ProjectController::class, 'show']);

    Route::get('/tags', [TagController::class, 'index'])->name('tags');
    Route::get('/tag/{id}', [TagController::class, 'show']);

    Route::view('profile', 'profile')->name('profile');
});

require __DIR__.'/auth.php';
