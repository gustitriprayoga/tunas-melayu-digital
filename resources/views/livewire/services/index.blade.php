<div class="bg-[#0B0F19] text-white overflow-hidden selection:bg-cyan-500 selection:text-white">

    {{-- ========================================== --}}
    {{-- HEADER: HUGE TYPOGRAPHY & PARTICLES --}}
    {{-- ========================================== --}}
    <section class="relative pt-40 pb-20 overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full z-0 pointer-events-none">
            <div
                class="absolute top-[-10%] left-[20%] w-[500px] h-[500px] bg-cyan-600/20 rounded-full blur-[120px] animate-pulse">
            </div>
            <div
                class="absolute bottom-[-10%] right-[20%] w-[500px] h-[500px] bg-purple-600/20 rounded-full blur-[120px] animate-pulse animation-delay-2000">
            </div>
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:32px_32px]">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <span data-aos="fade-down"
                class="inline-block py-1 px-3 rounded-full bg-white/5 border border-white/10 text-cyan-400 text-xs font-bold tracking-[0.2em] uppercase mb-6 backdrop-blur-md">
                Our Core Expertise
            </span>
            <h1 data-aos="zoom-in" class="text-6xl md:text-8xl font-black tracking-tighter mb-8 leading-tight">
                ENGINEERING <br>
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600">EXCELLENCE.</span>
            </h1>
            <p data-aos="fade-up" data-aos-delay="200" class="text-slate-400 text-lg max-w-2xl mx-auto leading-relaxed">
                Kami tidak hanya membuat website. Kami membangun ekosistem digital yang kompleks, aman, dan scalable
                untuk membawa bisnis Anda mendominasi pasar.
            </p>
        </div>
    </section>


    {{-- ========================================== --}}
    {{-- MAIN LOOP: ZIG-ZAG SERVICE LAYOUT --}}
    {{-- ========================================== --}}
    <div class="relative py-20 space-y-32">
        <div
            class="absolute left-6 md:left-1/2 top-0 bottom-0 w-px bg-gradient-to-b from-transparent via-cyan-500/30 to-transparent hidden md:block">
        </div>

        @foreach ($services as $index => $service)
            <section id="{{ $service->slug }}" class="relative container mx-auto px-6 group">

                <div
                    class="flex flex-col md:flex-row items-center gap-12 md:gap-24 {{ $index % 2 == 1 ? 'md:flex-row-reverse' : '' }}">

                    {{-- COL 1: VISUAL / ICON (STICKY EFFECT) --}}
                    <div class="w-full md:w-1/2 relative" data-aos="{{ $index % 2 == 1 ? 'fade-left' : 'fade-right' }}">
                        <div
                            class="absolute -top-20 {{ $index % 2 == 1 ? '-right-10' : '-left-10' }} text-[12rem] font-black text-white/5 select-none leading-none z-0">
                            0{{ $index + 1 }}
                        </div>

                        <div class="relative z-10 group-hover:scale-[1.02] transition duration-700 ease-out">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-purple-500 rounded-3xl blur-2xl opacity-20 group-hover:opacity-40 transition duration-500">
                            </div>

                            <div
                                class="relative bg-[#0F1623]/80 backdrop-blur-xl border border-white/10 rounded-3xl p-10 overflow-hidden">
                                <div
                                    class="absolute inset-0 opacity-10 bg-[url('https://grainy-gradients.vercel.app/noise.svg')]">
                                </div>

                                <div class="h-64 flex items-center justify-center relative">
                                    <div
                                        class="w-32 h-32 rounded-2xl bg-gradient-to-br from-cyan-500/20 to-purple-500/20 flex items-center justify-center border border-white/10 shadow-[0_0_50px_rgba(6,182,212,0.15)] animate-float">
                                        @svg($service->icon, 'w-16 h-16 text-white drop-shadow-[0_0_15px_rgba(255,255,255,0.5)]')
                                    </div>

                                    <div
                                        class="absolute w-48 h-48 border border-white/10 rounded-full animate-spin-slow">
                                    </div>
                                    <div
                                        class="absolute w-60 h-60 border border-dashed border-white/5 rounded-full animate-reverse-spin">
                                    </div>
                                </div>

                                <div class="mt-8 border-t border-white/5 pt-6">
                                    <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-3">Powering
                                        Tech</p>
                                    <div class="flex flex-wrap gap-2">
                                        {{-- Dummy Tech Stack (Bisa diupdate dinamis jika ada kolom tech di tabel service) --}}
                                        <span
                                            class="px-3 py-1 text-xs font-mono text-cyan-300 bg-cyan-900/30 border border-cyan-500/20 rounded">Laravel
                                            12</span>
                                        <span
                                            class="px-3 py-1 text-xs font-mono text-purple-300 bg-purple-900/30 border border-purple-500/20 rounded">Livewire</span>
                                        <span
                                            class="px-3 py-1 text-xs font-mono text-slate-300 bg-white/5 border border-white/10 rounded">Tailwind</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- COL 2: CONTENT DETAILS --}}
                    <div class="w-full md:w-1/2 relative z-10" data-aos="fade-up" data-aos-delay="100">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="h-px w-12 bg-cyan-500"></div>
                            <span class="text-cyan-400 font-bold uppercase tracking-widest text-sm">Service
                                0{{ $index + 1 }}</span>
                        </div>

                        <h2
                            class="text-4xl md:text-5xl font-black mb-6 text-white group-hover:text-cyan-200 transition duration-300">
                            {{ $service->title }}
                        </h2>

                        <div class="prose prose-lg prose-invert text-slate-400 mb-8 leading-relaxed">
                            <p>{{ $service->short_description }}</p>
                            <p>Kami merancang solusi {{ strtolower($service->title) }} yang berfokus pada pengalaman
                                pengguna (UX), kecepatan loading, dan keamanan data tingkat tinggi.</p>
                        </div>

                        <ul class="space-y-4 mb-10">
                            <li class="flex items-start gap-3">
                                <div
                                    class="mt-1 w-5 h-5 rounded-full bg-cyan-500/20 flex items-center justify-center text-cyan-400">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-slate-300">Custom Architecture Design</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div
                                    class="mt-1 w-5 h-5 rounded-full bg-cyan-500/20 flex items-center justify-center text-cyan-400">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-slate-300">Scalable & Secure Implementation</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <div
                                    class="mt-1 w-5 h-5 rounded-full bg-cyan-500/20 flex items-center justify-center text-cyan-400">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-slate-300">24/7 Monitoring & Support</span>
                            </li>
                        </ul>

                        <a href="{{ route('services.show', $service->slug) }}" wire:navigate
                            class="group/btn inline-flex items-center gap-3 px-8 py-4 bg-white text-black font-bold rounded-full hover:bg-cyan-400 transition-all duration-300 shadow-[0_0_20px_rgba(255,255,255,0.3)]">
                            <span>Detail Layanan</span>
                            <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>

                </div>
            </section>
        @endforeach
    </div>


    {{-- ========================================== --}}
    {{-- SECTION: OUR WORKFLOW (PROCESS) --}}
    {{-- ========================================== --}}
    <section class="py-32 relative border-t border-white/5 bg-[#0F1623]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-black mb-4">ALUR <span class="text-purple-500">KERJA</span></h2>
                <p class="text-slate-400">Metodologi kami untuk menjamin kualitas terbaik.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="relative group" data-aos="fade-up" data-aos-delay="0">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-cyan-600 to-blue-600 rounded-2xl blur opacity-0 group-hover:opacity-50 transition duration-500">
                    </div>
                    <div class="relative bg-[#0B0F19] p-8 rounded-2xl border border-white/10 h-full">
                        <span class="text-6xl font-black text-white/5 absolute top-4 right-4">01</span>
                        <div
                            class="w-12 h-12 bg-cyan-500/20 rounded-lg flex items-center justify-center text-cyan-400 mb-6">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Discovery</h3>
                        <p class="text-slate-400 text-sm">Analisis mendalam kebutuhan bisnis, riset pasar, dan
                            penetapan tujuan proyek.</p>
                    </div>
                </div>

                <div class="relative group" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl blur opacity-0 group-hover:opacity-50 transition duration-500">
                    </div>
                    <div class="relative bg-[#0B0F19] p-8 rounded-2xl border border-white/10 h-full">
                        <span class="text-6xl font-black text-white/5 absolute top-4 right-4">02</span>
                        <div
                            class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center text-blue-400 mb-6">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Design</h3>
                        <p class="text-slate-400 text-sm">Perancangan UI/UX futuristik dan arsitektur sistem yang
                            scalable.</p>
                    </div>
                </div>

                <div class="relative group" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl blur opacity-0 group-hover:opacity-50 transition duration-500">
                    </div>
                    <div class="relative bg-[#0B0F19] p-8 rounded-2xl border border-white/10 h-full">
                        <span class="text-6xl font-black text-white/5 absolute top-4 right-4">03</span>
                        <div
                            class="w-12 h-12 bg-purple-500/20 rounded-lg flex items-center justify-center text-purple-400 mb-6">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Develop</h3>
                        <p class="text-slate-400 text-sm">Penulisan kode bersih (clean code) menggunakan teknologi
                            terbaru (Laravel 12, dll).</p>
                    </div>
                </div>

                <div class="relative group" data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-pink-600 to-red-600 rounded-2xl blur opacity-0 group-hover:opacity-50 transition duration-500">
                    </div>
                    <div class="relative bg-[#0B0F19] p-8 rounded-2xl border border-white/10 h-full">
                        <span class="text-6xl font-black text-white/5 absolute top-4 right-4">04</span>
                        <div
                            class="w-12 h-12 bg-pink-500/20 rounded-lg flex items-center justify-center text-pink-400 mb-6">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 3.214L13 21l-2.286-6.857L5 12l5.714-3.214L13 3z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Launch</h3>
                        <p class="text-slate-400 text-sm">Deploy ke server production, testing akhir, dan serah terima
                            ke klien.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ========================================== --}}
    {{-- SECTION: CTA --}}
    {{-- ========================================== --}}
    <section class="py-24 text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-5xl font-black mb-8 text-white">Butuh Layanan Spesifik?</h2>
            <a href="{{ route('contact') }}" wire:navigate
                class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-gradient-to-r from-cyan-600 to-blue-600 rounded-full hover:from-cyan-500 hover:to-blue-500 shadow-lg hover:shadow-cyan-500/50">
                Konsultasikan Gratis
            </a>
        </div>
    </section>

    <style>
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-reverse-spin {
            animation: spin 15s linear infinite reverse;
        }
    </style>
</div>
