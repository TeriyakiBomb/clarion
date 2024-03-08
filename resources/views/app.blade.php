 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             {{ __('Home') }}
         </h2>
     </x-slot>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($tasks as $task)
                        <div class="text-left pr-10">
                            <h1 class="font-bold">
                                 {{ $task->name }}
                                 PREOR{{ $task->priority->name }}
                            </h1>
                            {{$task->project->name}}
                            <br>
                            <br>
                            @foreach($task->tags as $tag)
                                {{$tag->name}}
                            @endforeach
                            <br>
                            <br>
                        </div>
                    @endforeach
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>

