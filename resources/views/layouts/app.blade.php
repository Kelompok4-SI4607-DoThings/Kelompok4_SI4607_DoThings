<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DoThings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .content-wrapper {
        flex: 1;
    }
</style>
</head>
<body>

    @include('partials.navbar')

    <div class="container mt-4 content-wrapper">
        @yield('content')
    </div>

    @include('partials.footer') {{-- Pastikan baris ini ada di sini --}}

</body>
</html>
