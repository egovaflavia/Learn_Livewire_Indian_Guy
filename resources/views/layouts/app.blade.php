<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>
    <link rel="shortcut icon" href="https://laravel-livewire.com/img/twitter.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <livewire:styles />
    <livewire:scripts />
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="bg-body text-body bg-light">
    <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex justify-content-start mb-5">
        <div>
            <a href="/" class="mx-3 py-4">Home</a>
        </div>
        @auth
        <livewire:logout />
        @endauth

        @guest
        <div>
            <a href="/login" class="mx-3 py-4">Login</a>
        </div>
        <div>
            <a href="/register" class="mx-3 py-4">Register</a>
        </div>
        @endguest
    </nav>
    <div class="container">
        @yield('content')
        <div class="row">
            <livewire:tickets />
            <livewire:comments />
        </div>
    </div>
</body>

</html>
