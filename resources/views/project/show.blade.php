{{dump($project)}}


<h1>{{$project->name}}</h1>

@forelse($project->tasks as $task)
    {{$task->name}}

    <br>
    <br>
    @empty
        No tasks in this project
@endforelse
