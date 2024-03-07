<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif

            @foreach($tasks as $task)
                 <div class="text-left pr-10">
                     <h1 class="font-bold">
                          {{ $task->name }}
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
    </body>
</html>
