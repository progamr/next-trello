<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Trello</h1>
    <ul>
        @forelse($projects as $project)
                <li>
                    <a href={{$project->path()}}>{{$project->title}}</a>
                </li>
        @empty
            <div>No projects yet</div>
        @endforelse
    </ul>
</body>
</html>
