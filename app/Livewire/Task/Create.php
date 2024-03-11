<?php

namespace App\Livewire\Task;

use App\Models\Project;
use App\Models\Task;
use Livewire\Component;

class Create extends Component
{
    public $name = '';
    public $due_date = '';
    public $project_id = '';

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|max:255',
            'project_id' => 'required|exists:projects,id', // ENSURE PROJECT EXISTS
        ]);
    }

    public function saveTask(): void
    {
        $validatedData = $this->validate([
            'name' => 'required|max:255',
            'project_id' => 'required|exists:projects,id', // VALIDATION RULES FOR PROJECT
        ]);

        $userId = auth()->id();

        $validatedData['user_id'] = $userId;
        $validatedData['due_date'] = $this->due_date;

        Task::create($validatedData);

        //reset the form

        $this->name = '';
        $this->project_id = '';

        $this->dispatch('task-created');

        session()->flash('message', 'Task successfully created.');

    }

    public function render()
    {
        $projects = Project::orderBy('name')->get();

        return view('livewire.task.create', compact('projects'));
    }
}
