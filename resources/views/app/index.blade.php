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
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        @foreach($tasks as $task)
                        <div class="text-left pr-10">
                                <h1 class="font-bold">
                                     {{ $task->name }}
                                </h1>
                                <br>
                                <br>
                                @foreach($tags as $tag)
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
    </div>
 </x-app-layout>

