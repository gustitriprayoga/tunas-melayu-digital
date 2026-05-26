<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }} - Tunas Melayu Digital</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        :root {
            --primary-cyan: #06b6d4;
            --primary-purple: #9333ea;
            --primary-blue: #3b82f6;
            --dark-bg: #0f172a;
        }

        body {
            background-color: var(--dark-bg);
            color: #e5e7eb;
        }

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

<body class="bg-[#0f172a] text-gray-100">
    <!-- Animated Background Blobs - Hidden for better readability in admin -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-50 hidden">
        <div class="bg-blob bg-cyan-500 w-96 h-96 top-0 -left-20 opacity-20"></div>
        <div class="bg-blob bg-purple-600 w-96 h-96 bottom-0 -right-20 opacity-20 animation-delay-2000"></div>
        <div class="bg-blob bg-blue-600 w-64 h-64 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-10"></div>
    </div>

    <div class="flex h-screen relative z-10" x-data="{ sidebarOpen: false }">
        <!-- Sidebar -->
        <aside 
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-[#0d1420] border-r border-cyan-500/30 shadow-lg transform transition-transform duration-300 ease-in-out lg:relative lg:translate-x-0">
            
            <div class="p-6 border-b border-cyan-500/30 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('asset/logo/logo-default.png') }}" class="w-8 h-8 rounded-lg" alt="Logo">
                    <h1 class="text-xl font-bold text-white whitespace-nowrap">Tunas Admin</h1>
                </div>
                <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <nav class="p-4 space-y-2 overflow-y-auto max-h-[calc(100vh-100px)]">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-cyan-500/20 to-purple-500/20 text-cyan-300 border border-cyan-500/50 shadow-[0_0_20px_rgba(6,182,212,0.3)]' : 'text-gray-400 hover:text-cyan-300 hover:bg-cyan-500/10' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h2a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h2a1 1 0 001-1V9m-9 9l-2-1m0 0l-4-2m0 0v5a2 2 0 002 2h12a2 2 0 002-2v-5m0 0l-4 2m0 0l-2 1" />
                    </svg>
                    Dashboard
                </a>

                <div class="pt-4">
                    <h3 class="px-4 py-2 text-xs font-semibold text-cyan-400/50 uppercase tracking-widest">Content Management</h3>

                    <a href="{{ route('admin.pages.index') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.pages.*') ? 'bg-gradient-to-r from-cyan-500/20 to-purple-500/20 text-cyan-300 border border-cyan-500/50 shadow-[0_0_20px_rgba(6,182,212,0.3)]' : 'text-gray-400 hover:text-cyan-300 hover:bg-cyan-500/10' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Home Page
                    </a>

                    <a href="{{ route('admin.about') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.about') ? 'bg-gradient-to-r from-cyan-500/20 to-purple-500/20 text-cyan-300 border border-cyan-500/50 shadow-[0_0_20px_rgba(6,182,212,0.3)]' : 'text-gray-400 hover:text-cyan-300 hover:bg-cyan-500/10' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        About Page
                    </a>

                    <a href="{{ route('admin.portfolio.index') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.portfolio.*') ? 'bg-gradient-to-r from-cyan-500/20 to-purple-500/20 text-cyan-300 border border-cyan-500/50 shadow-[0_0_20px_rgba(6,182,212,0.3)]' : 'text-gray-400 hover:text-cyan-300 hover:bg-cyan-500/10' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Portfolio
                    </a>

                    <a href="{{ route('admin.services.index') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.services.*') ? 'bg-gradient-to-r from-cyan-500/20 to-purple-500/20 text-cyan-300 border border-cyan-500/50 shadow-[0_0_20px_rgba(6,182,212,0.3)]' : 'text-gray-400 hover:text-cyan-300 hover:bg-cyan-500/10' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Services
                    </a>

                    <a href="{{ route('admin.packages.index') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.packages.*') ? 'bg-gradient-to-r from-cyan-500/20 to-purple-500/20 text-cyan-300 border border-cyan-500/50 shadow-[0_0_20px_rgba(6,182,212,0.3)]' : 'text-gray-400 hover:text-cyan-300 hover:bg-cyan-500/10' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Pricing
                    </a>

                    <a href="{{ route('admin.testimonials') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.testimonials') ? 'bg-gradient-to-r from-cyan-500/20 to-purple-500/20 text-cyan-300 border border-cyan-500/50 shadow-[0_0_20px_rgba(6,182,212,0.3)]' : 'text-gray-400 hover:text-cyan-300 hover:bg-cyan-500/10' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        Testimonials
                    </a>

                    <a href="{{ route('admin.contact') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.contact') ? 'bg-gradient-to-r from-cyan-500/20 to-purple-500/20 text-cyan-300 border border-cyan-500/50 shadow-[0_0_20px_rgba(6,182,212,0.3)]' : 'text-gray-400 hover:text-cyan-300 hover:bg-cyan-500/10' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Contact Settings
                    </a>
                </div>

                <div class="pt-4 pb-20">
                    <h3 class="px-4 py-2 text-xs font-semibold text-cyan-400/50 uppercase tracking-widest">Settings</h3>

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="w-full text-left flex items-center px-4 py-3 rounded-lg text-gray-400 hover:text-red-400 hover:bg-red-500/10 transition-all duration-300">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto bg-[#0f172a] relative">
            <!-- Mobile Header -->
            <header class="lg:hidden bg-[#0d1420] border-b border-cyan-500/30 p-4 flex justify-between items-center sticky top-0 z-40">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('asset/logo/logo-default.png') }}" class="w-8 h-8 rounded-lg" alt="Logo">
                    <span class="text-white font-bold tracking-tight">Tunas Admin</span>
                </div>
                <button @click="sidebarOpen = true" class="text-cyan-400 p-2 rounded-lg bg-cyan-500/10 border border-cyan-500/30">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                </button>
            </header>

            <div class="p-4 md:p-8">
                {{ $slot }}
            </div>
        </main>

        <!-- Overlay for mobile -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 lg:hidden" x-transition.opacity></div>
    </div>

    <!-- Cybernetic Toast Notification System -->
    <div x-data="{
        show: false,
        message: '',
        type: 'success',
        timer: null,
        init() {
            // 1. Listen to Livewire's notify dispatch
            window.addEventListener('notify', event => {
                const data = event.detail[0] || event.detail;
                this.showToast(data.message, data.type || 'success');
            });

            // 2. Check for session flash messages on page load
            @if (session()->has('success'))
                this.showToast('{{ session('success') }}', 'success');
            @endif
            @if (session()->has('error'))
                this.showToast('{{ session('error') }}', 'error');
            @endif
        },
        showToast(msg, type = 'success') {
            this.message = msg;
            this.type = type;
            this.show = true;
            clearTimeout(this.timer);
            this.timer = setTimeout(() => {
                this.show = false;
            }, 4000);
        }
    }"
    class="fixed bottom-5 right-5 z-[9999] pointer-events-none">
        <div x-show="show"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="translate-y-10 opacity-0 scale-95"
             x-transition:enter-end="translate-y-0 opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="translate-y-0 opacity-100 scale-100"
             x-transition:leave-end="translate-y-10 opacity-0 scale-95"
             class="pointer-events-auto flex items-center gap-3 p-4 rounded-xl shadow-2xl border min-w-[320px] max-w-md bg-[#0F1623] transition-all duration-300"
             :class="{
                 'border-green-500/50 shadow-[0_0_20px_rgba(34,197,94,0.15)]': type === 'success',
                 'border-red-500/50 shadow-[0_0_20px_rgba(239,68,68,0.15)]': type === 'error',
                 'border-cyan-500/50 shadow-[0_0_20px_rgba(6,182,212,0.15)]': type === 'info'
             }">
            <!-- Icon -->
            <div class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center"
                 :class="{
                     'bg-green-500/10 text-green-400': type === 'success',
                     'bg-red-500/10 text-red-400': type === 'error',
                     'bg-cyan-500/10 text-cyan-400': type === 'info'
                 }">
                <!-- Success Check -->
                <svg x-show="type === 'success'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
                <!-- Error Cross -->
                <svg x-show="type === 'error'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <!-- Info Exclamation -->
                <svg x-show="type === 'info'" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <!-- Message -->
            <div class="flex-grow">
                <p class="text-sm font-semibold text-white uppercase tracking-wider font-mono text-[10px]"
                   :class="{
                       'text-green-400': type === 'success',
                       'text-red-400': type === 'error',
                       'text-cyan-400': type === 'info'
                   }">
                    System Broadcast
                </p>
                <p class="text-sm text-gray-200 mt-0.5 leading-relaxed" x-text="message"></p>
            </div>
            <!-- Close Button -->
            <button @click="show = false" class="text-gray-500 hover:text-gray-300 transition-colors p-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    @stack('scripts')
    @livewireScripts
</body>

</html>
