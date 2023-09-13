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
        @include('personal.includes.sidebar')
        @yield('content')
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger m-1">Logout</button>
        </form>
    </main>
</body>

</html>
