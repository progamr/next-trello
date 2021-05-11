<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<h1>Create a Project</h1>
<form method="POST" action="/projects">
    @csrf
    <div>
        <label for="title">Title</label>
        <div>
            <input type="text" name="title" placeholder="Title" />
        </div>
    </div>
    <div>
        <label for="description">Description</label>
        <div>
            <input type="text" name="description" placeholder="Description" />
        </div>
    </div>
    <div>
        <button type="submit">Create Project</button>
    </div>
</form>
</body>
</html>
