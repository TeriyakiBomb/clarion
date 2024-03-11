<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Create extends Component
{
    public $name = '';

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName, ['name' => 'required|max:255']);
    }

    public function saveTask(): void
    {
        $validatedData = $this->validate(['name' => 'required|max:255']);

        $userId = auth()->id();

        $validatedData['user_id'] = $userId;

        Task::create($validatedData);

        $this->name = '';
        $this->dispatch('task-created');

        session()->flash('message', 'Task successfully created.');

    }

    public function render()
    {
        return view('livewire.task.create');
    }
}
