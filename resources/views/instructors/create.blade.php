<!DOCTYPE html>
<html>
<head>
    <title>Create Instructor</title>
</head>
<body>

<h1>Create Instructor</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('instructors.store') }}" method="POST">

    @csrf

    <div>
        <label>Name</label>

        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
        >
    </div>

    <br>

    <div>
        <label>Email</label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
        >
    </div>

    <br>

    <div>
        <label>Phone</label>

        <input
            type="text"
            name="phone"
            value="{{ old('phone') }}"
        >
    </div>

    <br>

    <button type="submit">
        Create Instructor
    </button>

</form>

<br>

<a href="{{ route('instructors.index') }}">
    Back
</a>

</body>
</html>
