<html>
<head>
    <title>Laravel 10 - @yield('title')</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
