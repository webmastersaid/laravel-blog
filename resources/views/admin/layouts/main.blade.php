<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <main class="d-flex flex-nowrap">
        @include('admin.includes.sidebar')
        @yield('content')
    </main>
</body>

</html>
