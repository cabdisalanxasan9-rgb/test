<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kharash Gym')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-foreground antialiased">
    @yield('content')
    
    @auth
        @include('partials.bottom-nav')
    @endauth
</body>
</html>
