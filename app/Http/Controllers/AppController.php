<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\View\View;

class AppController extends Controller
{
    public function index(): View
    {
        return view('app.index', [
            'projects' => Project::where('active', 1)->get(),
            'tasks' => Task::all(),
            'tags' => Task::with('tags'),
        ]);
    }
}
