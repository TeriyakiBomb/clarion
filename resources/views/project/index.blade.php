<h1>Projects</h1>

@forelse($projects as $project)
    <ul>
        <li><a href="/project/{{$project->id}}">{{$project->name}}</a></li>
    </ul>
    @empty
        No projects
@endforelse
