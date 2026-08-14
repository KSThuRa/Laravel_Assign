<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <h2>Category List</h2>
    <a href="{{route('categories.create')}}">+Create</a>
    @foreach ($category as $data)
        <h3>{{ $data['id']}} : {{ $data['name']}}</h3>
        <form action="{{ route('categories.delete', [$data->id])}}" method="POST">
            @csrf
            <button type="submit">Delete</button>
        </form>
    @endforeach
</body>
</html>
