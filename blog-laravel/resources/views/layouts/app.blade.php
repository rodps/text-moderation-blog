<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog - @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('partials.navbar')
    <main class="max-w-5xl mx-auto py-12">
        @yield('content')
    </main>
    @include('partials.footer')
</body>
</html>