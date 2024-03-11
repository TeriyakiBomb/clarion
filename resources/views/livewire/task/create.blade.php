<div x-data="{create: false}" @keyup.shift.c.window="create = true">

    <div @click="create = true" >
        + Create task
    </div>

    <div class="" x-show="create" x-trap="create"  @click.outside="create = false">
        <form wire:submit.prevent="createTask" @cmd.enter="create = true" @keyup.enter="create = false">
            <input type="text" wire:model="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
            <input type="date" wire:model="due_date">
            <div class="form-group">
                <label for="project">Project</label>
                <select id="project" wire:model="project_id" class="form-control">
                    <option>Select a project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
                @error('project_id') <span class="error">{{ $message }}</span> @enderror
            </div>


        </form>
    </div>
    @if (session()->has('message'))


    @endif

    {{-- Need to throw this into a generic notification component at some point--}}
    <div x-data="{ open: false, timer: null }">
        <div @task-created.window="
            open = true;
            clearTimeout(timer);
            timer = setTimeout(() => open = false, 3000)
        ">
            <div
                x-cloak
                x-show="open"
                x-transition:enter="transition ease-in duration-300"
                x-transition:leave="transition ease-out duration-1000"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            >
                <div id="toast-simple" class="absolute bottom-0 right-0 m-4 flex items-center w-auto max-w-xs p-4 space-x-4 rtl:space-x-reverse text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-500 rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 17 8 2L9 1 1 19l8-2Zm0 0V9"/>
                    </svg>
                    <div class="ps-4 text-sm font-normal">Task created</div>
                </div>
            </div>
        </div>
    </div>
</div>
