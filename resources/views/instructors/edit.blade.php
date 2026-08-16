<!DOCTYPE html>
<html>
<head>
    <title>Edit Instructor</title>
</head>
<body>

<h1>Edit Instructor</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    action="{{ route('instructors.update', $instructor->id) }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <div>
        <label>Name</label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $instructor->name) }}"
        >
    </div>

    <br>

    <div>
        <label>Email</label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $instructor->email) }}"
        >
    </div>

    <br>

    <div>
        <label>Phone</label>

        <input
            type="text"
            name="phone"
            value="{{ old('phone', $instructor->phone) }}"
        >
    </div>

    <br>

    <button type="submit">
        Update Instructor
    </button>

</form>

<br>

<a href="{{ route('instructors.index') }}">
    Back
</a>

</body>
</html>
