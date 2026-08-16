<!DOCTYPE html>
<html>
<head>
    <title>Instructor Details</title>
</head>
<body>

<h1>Instructor Details</h1>

<p>
    <strong>ID:</strong>
    {{ $instructor->id }}
</p>

<p>
    <strong>Name:</strong>
    {{ $instructor->name }}
</p>

<p>
    <strong>Email:</strong>
    {{ $instructor->email }}
</p>

<p>
    <strong>Phone:</strong>
    {{ $instructor->phone }}
</p>

<a href="{{ route('instructors.index') }}">
    Back
</a>

</body>
</html>
