<!DOCTYPE html>
<html>
<head>
    <title>Batches</title>
</head>
<body>

<h1>Batch List</h1>

@if (session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

<br>

<a href="{{ route('batches.create') }}">
    Create New Batch
</a>

<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($batches as $batch)
            <tr>
                <td>{{ $batch->id }}</td>
                <td>{{ $batch->name }}</td>
                <td>{{ $batch->description }}</td>

                <td>
                    <form
                        action="{{ route('batches.destroy', $batch->id) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this batch?')"
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
