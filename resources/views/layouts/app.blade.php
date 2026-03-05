<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kharash Gym')</title>
    @php
        $hasViteManifest = file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'));
    @endphp

    @if($hasViteManifest)
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            body { font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; margin: 0; }
        </style>
    @endif
</head>
<body class="min-h-screen bg-background text-foreground antialiased">
    @yield('content')
    
    @auth
        @include('partials.bottom-nav')
    @endauth
</body>
</html>
