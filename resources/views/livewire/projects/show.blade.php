<div>
    @foreach($projects as $project)
        <a class="cursor-pointer" href="/project/{{$project->id}}" wire:navigate>{{$project->name}}</a>
    @endforeach
</div>
