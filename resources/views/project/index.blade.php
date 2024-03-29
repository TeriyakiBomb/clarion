<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @forelse($projects as $project)
                        <ul>
                            <li><a href="/project/{{$project->id}}">{{$project->name}}</a></li>
                        </ul>
                        @empty
                            No projects
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
