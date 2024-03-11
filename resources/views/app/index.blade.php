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
                <livewire:projects.show/>
            </div>
            <div class="sm:px-6 lg:px-8">
                <livewire:task.create/>
                <livewire:tasks.show/>


            </div>
        </div>

    </div>
 </x-app-layout>

