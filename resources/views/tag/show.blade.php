<h1>{{$tag->name}}</h1>

@foreach($tag->tasks as $task)
    {{$task->name}}
@endforeach

