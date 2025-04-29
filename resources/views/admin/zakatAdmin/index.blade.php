<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zakat Admin</title>
</head>
<body>
    <h1>Manage Zakat Records</h1>
    <a href="{{ route('zakatAdmin.create') }}">Add New Zakat</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($zakats as $zakat)
            <tr>
                <td>{{ $zakat->id }}</td>
                <td>{{ $zakat->name }}</td>
                <td>{{ $zakat->status }}</td>
                <td>
                    <form action="{{ route('zakatAdmin.destroy', $zakat->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: red;">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
