 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             {{ __('Home') }}
         </h2>
     </x-slot>

    <div class="py-12 mx-auto container">
         <div class="flex flex-row">
            <div class="w-10 mr-10">
                <h1 class="font-bold pb-3">Projects</h1>
                @foreach($projects as $project)
                    <a class="cursor-pointer" href="/project/{{$project->id}}" wire:navigate>{{$project->name}}</a>
                @endforeach
            </div>
            <div class="sm:px-6 lg:px-8">
                @foreach($tasks as $task)
                    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg mt-3">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="text-left pr-10">
                                <h1 class="font-bold"> Task name </h1>
                                {{ $task->name }} <br>
                                <h1 class="font-bold"> Creator </h1>
                                {{ $task->creator->name }}
                                <h1 class="font-bold"> Priority </h1>

                               @if(dueDateStatus($task->due_date) == 'overdue')
                                   <span class="text-red-500"> {{formatDate($task->due_date, 'd M Y')}}</span>

                                   @else
                                        {{ dueDateStatus($task->due_date) }}
                               @endif

                                @if($task->completed == 0)

                                    @else
                                        Yes
                                @endif
                                @foreach($tags as $tag)
                                    {{$tag->name}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 </x-app-layout>

