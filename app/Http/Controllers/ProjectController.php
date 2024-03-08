<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('project.index', [
            'projects' => Project::all(),
        ]);
    }

    public function show(string $id): View
    {
        return view('project.show', [
            'project' => Project::findOrFail($id),
        ]);
    }
}
