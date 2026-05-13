<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'IF21' }}</title>

    {{-- Bootstrap 5 CSS (CDN for quick setup. See notes below for Vite/npm alternative) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Vite entry points --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Inject additional CSS from child views --}}
    @stack('styles')
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">IF21</a>
            <a class="nav-link{{request()->is('/')}}"></a>
        </div>
    </nav>

    <main class="py-4">
        {{ $slot }}
    </main>

    {{-- Bootstrap 5 JS (CDN) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Inject additional JS from child views --}}
    @stack('scripts')
</body>
</html>