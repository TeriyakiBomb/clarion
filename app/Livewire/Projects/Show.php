<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class Show extends Component
{
    public $projects;
    function mount()
    {
        $this->projects = Project::all();
    }
    public function render()
    {
        return view('livewire.projects.show', ['projects' => $this->projects]);
    }
}
