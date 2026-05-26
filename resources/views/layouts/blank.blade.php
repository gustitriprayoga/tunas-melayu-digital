<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Tunas Melayu Digital</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        .bg-blob {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: blob 7s infinite;
            filter: blur(40px);
        }

        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
    </style>
</head>

<body class="bg-[#0f172a] text-gray-100 overflow-hidden">
    <!-- Animated Background Blobs -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-50">
        <div class="bg-blob bg-cyan-500 w-96 h-96 top-0 -left-20 opacity-20"></div>
        <div class="bg-blob bg-purple-600 w-96 h-96 bottom-0 -right-20 opacity-20 animation-delay-2000"></div>
        <div class="bg-blob bg-blue-600 w-64 h-64 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-10"></div>
    </div>

    <div class="flex items-center justify-center min-h-screen relative z-10 p-4">
        <div class="w-full max-w-md">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts
</body>

</html>
