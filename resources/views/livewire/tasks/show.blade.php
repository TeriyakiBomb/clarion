<div>
    @foreach($tasks as $task)
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg mt-3">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="text-left pr-10">

                    <h1 class="font-bold">{{ $task->name }}</h1>
                    <h1 class="font-bold"> Creator </h1>
                    {{ $task->creator->name }}
                    <h1 class="font-bold"> Priority </h1>

                    {{ optional($task->project)->name ?? '' }}

                @if(dueDateStatus($task->due_date) == 'overdue')
                        <span class="text-red-500"> {{formatDate($task->due_date, 'd M Y')}}</span>

                    @else
                        {{ dueDateStatus($task->due_date) }}
                    @endif


                    <button wire:click="markComplete({{$task->id}})">Mark as complete</button>

                </div>
            </div>
        </div>
    @endforeach
</div>
