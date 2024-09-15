<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Application' }}</title>
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <header class="bg-blue-500 text-white p-4">
        <div class="max-w-7xl mx-auto flex">
            <h1 class="text-3xl pl-5 py-1 border border-3 border-white font-bold">bos</h1>
            <h1 class="text-3xl pr-5 py-1 bg-white text-blue-500 font-bold">COD</h1>
        </div>
    </header>
    <main class="py-8 flex-grow">
        {{ $slot }}
    </main>
    <footer class="bg-blue-500 text-white p-4 mt-8">
        <div class="max-w-7xl mx-auto text-center">
            &copy; {{ date('Y') }} bosCOD | Design <i class="fa-solid fa-heart"></i> <a href="https://instagram.com/_vikyrr" target="_blank" class="font-bold">Viky Rodiatul Ulum</a>
        </div>
    </footer>
    @vite('resources/js/app.js')
</body>
</html>
