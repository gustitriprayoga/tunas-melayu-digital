<?php
$settings = \Joaopaulolndev\FilamentGeneralSettings\Models\GeneralSetting::first();
?>

<nav x-data="{ mobileMenuOpen: false }"
    class="fixed w-full top-0 z-50 transition-all duration-300 bg-[#0B0F19]/80 backdrop-blur-md border-b border-white/5">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">

            {{-- LOGO --}}
            <a href="{{ route('home') }}" @mouseenter="$store.sfx.playHover()" @click="$store.sfx.playClick()"
                wire:navigate class="flex items-center gap-3 group">
                <div
                    class="relative w-10 h-10 flex items-center justify-center bg-cyan-500/20 rounded-xl border border-cyan-500/50 group-hover:scale-110 transition duration-300 shadow-[0_0_15px_rgba(6,182,212,0.5)]">
                    @if ($settings && $settings->site_logo)
                        <img src="{{ Storage::url($settings->site_logo) }}" class="h-8 w-8 object-contain">
                    @else
                        <svg class="w-6 h-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    @endif
                </div>
                <span class="font-bold text-xl md:text-2xl tracking-wide text-white">
                    {{ $settings->site_name ?? 'Tunas' }}<span class="text-cyan-400">Digital</span>
                </span>
            </a>

            {{-- DESKTOP MENU (WITH ICONS & GLOW) --}}
            <div class="hidden md:flex items-center space-x-1">

                {{-- Home --}}
                <a href="{{ route('home') }}" @mouseenter="$store.sfx.playHover()" @click="$store.sfx.playClick()"
                    wire:navigate
                    class="px-4 py-2 rounded-lg flex items-center gap-2 transition-all duration-300 {{ request()->routeIs('home') ? 'text-cyan-400 bg-cyan-500/10 shadow-[0_0_10px_rgba(6,182,212,0.2)]' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('home') ? 'drop-shadow-[0_0_5px_rgba(6,182,212,0.8)]' : '' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium text-sm">Home</span>
                </a>

                {{-- Services --}}
                <a href="{{ route('services.index') }}" @mouseenter="$store.sfx.playHover()"
                    @click="$store.sfx.playClick()" wire:navigate
                    class="px-4 py-2 rounded-lg flex items-center gap-2 transition-all duration-300 {{ request()->routeIs('services.*') ? 'text-cyan-400 bg-cyan-500/10 shadow-[0_0_10px_rgba(6,182,212,0.2)]' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('services.*') ? 'drop-shadow-[0_0_5px_rgba(6,182,212,0.8)]' : '' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                    <span class="font-medium text-sm">Services</span>
                </a>

                {{-- PRICING (NEW) --}}
                <a href="{{ route('pricing') }}" @mouseenter="$store.sfx.playHover()" @click="$store.sfx.playClick()"
                    wire:navigate
                    class="px-4 py-2 rounded-lg flex items-center gap-2 transition-all duration-300 {{ request()->routeIs('pricing') ? 'text-cyan-400 bg-cyan-500/10 shadow-[0_0_10px_rgba(6,182,212,0.2)]' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('pricing') ? 'drop-shadow-[0_0_5px_rgba(6,182,212,0.8)]' : '' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium text-sm">Pricing</span>
                </a>

                {{-- Work --}}
                <a href="{{ route('portfolio.index') }}" @mouseenter="$store.sfx.playHover()"
                    @click="$store.sfx.playClick()" wire:navigate
                    class="px-4 py-2 rounded-lg flex items-center gap-2 transition-all duration-300 {{ request()->routeIs('portfolio.*') ? 'text-purple-400 bg-purple-500/10 shadow-[0_0_10px_rgba(168,85,247,0.2)]' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('portfolio.*') ? 'drop-shadow-[0_0_5px_rgba(168,85,247,0.8)]' : '' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="font-medium text-sm">Work</span>
                </a>

                {{-- About --}}
                <a href="{{ route('about') }}" @mouseenter="$store.sfx.playHover()" @click="$store.sfx.playClick()"
                    wire:navigate
                    class="px-4 py-2 rounded-lg flex items-center gap-2 transition-all duration-300 {{ request()->routeIs('about') ? 'text-cyan-400 bg-cyan-500/10 shadow-[0_0_10px_rgba(6,182,212,0.2)]' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    <svg class="w-5 h-5 {{ request()->routeIs('about') ? 'drop-shadow-[0_0_5px_rgba(6,182,212,0.8)]' : '' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium text-sm">About</span>
                </a>
                <a href="{{ route('testimonials') }}" wire:navigate
                    class="px-4 py-2 rounded-lg flex items-center gap-2 transition-all duration-300 {{ request()->routeIs('testimonials') ? 'text-cyan-400 bg-cyan-500/10 shadow-[0_0_10px_rgba(6,182,212,0.2)]' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    {{-- Icon Chat Bubble / Review --}}
                    <svg class="w-5 h-5 {{ request()->routeIs('testimonials') ? 'drop-shadow-[0_0_5px_rgba(6,182,212,0.8)]' : '' }}"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span class="font-medium text-sm">Testimonials</span>
                </a>

                {{-- CTA --}}
                <a href="{{ route('contact') }}" @mouseenter="$store.sfx.playHover()" @click="$store.sfx.playClick()"
                    wire:navigate
                    class="ml-4 px-6 py-2 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full font-bold text-white text-sm hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition transform hover:-translate-y-1 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    Contact
                </a>
            </div>


            {{-- MOBILE MENU BUTTON --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                    <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    {{-- MOBILE MENU (DROPDOWN) --}}
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden bg-[#0F1623]/95 backdrop-blur border-b border-white/10 absolute w-full left-0 z-40">
        <div class="flex flex-col px-6 py-6 space-y-4">
            <a href="{{ route('home') }}"
                class="flex items-center gap-3 text-white hover:text-cyan-400 font-medium p-2 rounded-lg hover:bg-white/5">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>
            <a href="{{ route('services.index') }}"
                class="flex items-center gap-3 text-white hover:text-cyan-400 font-medium p-2 rounded-lg hover:bg-white/5">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                </svg>
                Services
            </a>
            <a href="{{ route('pricing') }}"
                class="flex items-center gap-3 text-white hover:text-cyan-400 font-medium p-2 rounded-lg hover:bg-white/5">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Pricing
            </a>
            <a href="{{ route('portfolio.index') }}"
                class="flex items-center gap-3 text-white hover:text-cyan-400 font-medium p-2 rounded-lg hover:bg-white/5">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Work
            </a>
            <a href="{{ route('about') }}"
                class="flex items-center gap-3 text-white hover:text-cyan-400 font-medium p-2 rounded-lg hover:bg-white/5">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                About
            </a>

            <a href="{{ route('testimonials') }}"
                class="flex items-center gap-3 text-white hover:text-cyan-400 font-medium p-2 rounded-lg hover:bg-white/5">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                Testimonials
            </a>
            <a href="{{ route('contact') }}"
                class="text-center px-6 py-3 bg-cyan-600 rounded-lg font-bold text-white shadow-lg">Contact Us</a>
        </div>
    </div>
</nav>
