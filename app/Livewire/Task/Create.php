<?php

namespace App\Livewire\Task;

use App\Models\Project;
use App\Models\Task;
use Livewire\Component;

class Create extends Component
{
    public $name = '';
    public $due_date = '';
    public $project_id = null;

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|max:255',
        ]);
    }

    public function createTask(): void
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        if ($this->project_id) {
            $rules['project_id'] = 'exists:projects,id';
        }

        $validatedData = $this->validate($rules);

        $userId = auth()->id();

        $additionalData = [
            'user_id' => $userId,
            'due_date' => $this->due_date
        ];

        $data = array_merge($validatedData, $additionalData);

        Task::create($data);

        //reset
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
