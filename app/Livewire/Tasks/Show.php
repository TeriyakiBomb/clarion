<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public $tasks;

    #[On('task-created', 'fetchTasks')]

    function fetchTasks(): void
    {
        $this->tasks = Task::with('tags')->latest()->get();
    }

    function mount(): void
    {
        $this->fetchTasks();
    }


    public function render()
    {
        return view('livewire.tasks.show', ['tasks' => $this->tasks]);
    }
}
