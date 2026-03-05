<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kharash Gym')</title>
    @php
        $hasHotFile = file_exists(public_path('hot'));
        $manifestPath = public_path('build/manifest.json');
        $manifest = file_exists($manifestPath) ? json_decode((string) file_get_contents($manifestPath), true) : null;
        $cssFile = $manifest['resources/css/app.css']['file'] ?? 'assets/app-CIgUqIbS.css';
        $jsFile = $manifest['resources/js/app.js']['file'] ?? 'assets/app-Di7tyDlp.js';
    @endphp

    @if($hasHotFile)
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ '/build/' . $cssFile }}">
        <script type="module" src="{{ '/build/' . $jsFile }}"></script>
    @endif
</head>
<body class="min-h-screen bg-background text-foreground antialiased">
    @yield('content')
    
    @auth
        @include('partials.bottom-nav')
    @endauth
</body>
</html>
