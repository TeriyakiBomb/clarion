<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public $tasks;

    #[On('task-created', 'fetchTasks')]
    #[On('task-completed', 'fetchTasks')]

    function fetchTasks(): void
    {
        $this->tasks = Task::with('tags', 'project')->where('completed', false)->latest()->get();
    }

    public function markComplete($taskId): void
    {
        $task = Task::find($taskId);
        $task->update([
            'completed' => true,
        ]);

        $this->dispatch('task-completed', ['task' => $taskId]);
        //$this->dispatch('task-created');
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
