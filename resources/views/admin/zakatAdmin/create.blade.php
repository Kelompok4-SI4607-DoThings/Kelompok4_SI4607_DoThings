<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Zakat Record</title>
</head>
<body>
    <h1>Create Zakat Record</h1>
    <form action="{{ route('zakatAdmin.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Completed">Completed</option>
            <option value="Pending">Pending</option>
            <option value="Not Completed">Not Completed</option>
        </select><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
