<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Trello</h1>
    <ul>
        @foreach($projects as $project)
                <li>{{$project->title}}</li>
        @endforeach
    </ul>
</body>
</html>
