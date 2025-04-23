<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DoThings</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>

    @include('partials.navbar')
    
    <div class="container mt-4">
        @yield('content')
    </div>
    @include('partials.footer')
</body>
</html>
