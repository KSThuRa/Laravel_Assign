<!DOCTYPE html>
<html>
<head>
    <title>Instructors</title>
</head>
<body>

<h1>Instructor List</h1>

@if (session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

<a href="{{ route('instructors.create') }}">
    Add Instructor
</a>

<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($instructors as $instructor)
            <tr>
                <td>{{ $instructor->id }}</td>
                <td>{{ $instructor->name }}</td>
                <td>{{ $instructor->email }}</td>
                <td>{{ $instructor->phone }}</td>

                <td>
                    <a href="{{ route('instructors.show', $instructor->id) }}">
                        View
                    </a>

                    <a href="{{ route('instructors.edit', $instructor->id) }}">
                        Edit
                    </a>

                    <form
                        action="{{ route('instructors.destroy', $instructor->id) }}"
                        method="POST"
                        style="display:inline;"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
