<!DOCTYPE html>
<html>

<head>
    <title>New Post: {{ $post->title }}</title>
</head>

<body>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->description }}</p>
    <p>Published on: {{ $post->website->name }}</p>
</body>

</html>
