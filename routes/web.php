<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Models\Project;
use App\Models\Task;
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

Route::group(['middleware' => 'auth'], function () {

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
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
