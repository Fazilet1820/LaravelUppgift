<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My App</title>
    @vite('resources/css/app.css') <!-- Eğer Tailwind / Vite kullanıyorsan -->
    @livewireStyles
</head>
<body class="p-4">
    <nav class="mb-4">
        <a href="{{ route('home') }}" class="mr-2">Home</a>
        <a href="{{ route('customers.form') }}" class="mr-2">Create Customer</a>
    </nav>

    <div class="container mx-auto">
        @yield('content')
    </div>

    @livewireScripts
</body>
</html>

