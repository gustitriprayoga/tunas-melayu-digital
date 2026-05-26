<?php
$settings = \App\Models\GeneralSetting::first();
?>

<footer class="bg-gray-900 text-white pt-16 pb-8">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div class="col-span-1 md:col-span-1">
                @if ($settings && $settings->site_logo)
                    <img src="{{ Storage::url($settings->site_logo) }}" class="h-10 mb-6 brightness-0 invert"
                        alt="Logo">
                @else
                    <h2 class="text-2xl font-bold mb-6">TunasMelayu</h2>
                @endif
                <p class="text-gray-400 leading-relaxed">
                    {{ $settings->site_description ?? 'Mitra transformasi digital terpercaya untuk mengembangkan bisnis Anda ke level berikutnya.' }}
                </p>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-6">Tautan Cepat</h3>
                <ul class="space-y-4 text-gray-400">
                    <li><a href="{{ route('home') }}" wire:navigate class="hover:text-blue-400 transition">Beranda</a>
                    </li>
                    <li><a href="{{ route('about') }}" wire:navigate class="hover:text-blue-400 transition">Tentang
                            Kami</a></li>
                    <li><a href="{{ route('services.index') }}" wire:navigate
                            class="hover:text-blue-400 transition">Layanan</a></li>
                    <li><a href="{{ route('portfolio.index') }}" wire:navigate
                            class="hover:text-blue-400 transition">Portfolio</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-6">Layanan</h3>
                <ul class="space-y-4 text-gray-400">
                    <li>Web Development</li>
                    <li>Mobile Apps</li>
                    <li>UI/UX Design</li>
                    <li>IT Consultant</li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-6">Hubungi Kami</h3>
                <ul class="space-y-4 text-gray-400">
                    <li class="flex items-start gap-3">
                        @svg('heroicon-o-map-pin', 'w-6 h-6 text-blue-500 shrink-0')
                        <span>{{ $settings->office_address ?? 'Alamat kantor belum diatur' }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        @svg('heroicon-o-envelope', 'w-6 h-6 text-blue-500 shrink-0')
                        <span>{{ $settings->support_email ?? 'email@example.com' }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        @svg('heroicon-o-phone', 'w-6 h-6 text-blue-500 shrink-0')
                        <span>{{ $settings->whatsapp_number ?? '-' }}</span>
                    </li>
                </ul>
            </div>

        </div>


        <div class="mt-12 pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-mono text-slate-500"
            x-data="{
                ping: Math.floor(Math.random() * 50) + 10,
                time: new Date().toLocaleTimeString(),
                init() {
                    setInterval(() => {
                        this.time = new Date().toLocaleTimeString();
                        this.ping = Math.floor(Math.random() * 20) + 20; // Simulasi Ping berubah
                    }, 1000);
                }
            }">

            {{-- Left: Copyright --}}
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                <span>SYSTEM ONLINE</span>
                <span class="text-slate-700">|</span>
                <span>&copy; {{ date('Y') }} Tunas Melayu Digital</span>
            </div>

            {{-- Right: System Stats --}}
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2" title="Server Location">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>RIAU, ID</span>
                </div>
                <div class="flex items-center gap-2 text-cyan-500" title="Latency">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span x-text="ping + 'ms'"></span>
                </div>
                <div class="flex items-center gap-2 text-purple-400" title="Local Time">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span x-text="time"></span>
                </div>
            </div>
        </div>
    </div>
</footer>
