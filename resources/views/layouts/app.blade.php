<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DoThings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    @include('partials.navbar')
    <div class="container mt-4 flex-grow-1">
        @yield('content')
    </div>
    @include('partials.footer')
</body>
</html>
