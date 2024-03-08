<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'verified'], function () {

    Route::get('/', function (Project $project, Task $task) {
        return view('app', [
            'projects' => $project::all(),
            'tasks' => $task::all(),
        ]);
    })->name('app');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('/project/{id}', [ProjectController::class, 'show']);

    Route::get('/tags', [TagController::class, 'index'])->name('tags');
    Route::get('/tag/{id}', [TagController::class, 'show']);

    Route::view('profile', 'profile')->name('profile');
});

require __DIR__.'/auth.php';
