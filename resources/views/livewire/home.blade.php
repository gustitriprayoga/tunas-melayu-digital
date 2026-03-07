<div class="overflow-x-hidden bg-[#0B0F19] text-white selection:bg-cyan-500 selection:text-white" x-data="{
    scroll: 0,
    init() {
        // Fix AudioContext: Resume pas pertama kali klik di mana aja
        ['click', 'touchstart', 'keydown'].forEach(event => {
            document.addEventListener(event, () => {
                const ctx = $store.sfx.getContext();
                if (ctx && ctx.state === 'suspended') ctx.resume();
            }, { once: true });
        });
    }
}"
    @scroll.window="scroll = window.scrollY">

    {{-- 1. HERO SECTION --}}
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div
            class="absolute inset-0 z-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]">
        </div>

        {{-- Blobs Glow --}}
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-600/20 rounded-full blur-[128px] animate-pulse"></div>
        <div
            class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-600/20 rounded-full blur-[128px] animate-pulse animation-delay-2000">
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <div data-aos="fade-down"
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-cyan-500/30 bg-cyan-900/20 backdrop-blur-md mb-8">
                <span class="relative flex h-3 w-3">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-cyan-500"></span>
                </span>
                <span class="text-cyan-300 text-xs font-bold tracking-widest uppercase font-mono" x-scramble>System
                    Online v12.0</span>
            </div>

            <h1 class="text-6xl md:text-9xl font-black mb-6">
                <div class="glitch-wrapper">
                    <span class="glitch" data-text="{{ $page->hero_title }}">{{ $page->hero_title }}</span>
                </div>
                <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">DIGITAL.</span>
            </h1>

            <p data-aos="fade-up" data-aos-delay="200"
                class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto mb-10 font-light">
                {{ $page->hero_subtitle }}
            </p>

            <div data-aos="fade-up" data-aos-delay="400">
                <a @click="$store.sfx.playClick()" href="#portfolio"
                    class="relative px-8 py-4 bg-white text-black font-bold text-lg rounded-full overflow-hidden group inline-block">
                    <span
                        class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-cyan-400 to-blue-500 opacity-0 group-hover:opacity-100 transition duration-300"></span>
                    <span
                        class="relative z-10 group-hover:text-white transition">{{ $page->cta_text ?? 'Lihat Karya' }}</span>
                </a>
            </div>
        </div>
    </section>

    {{-- 2. MARQUEE SECTION --}}
    <section class="py-10 border-y border-white/5 bg-black/20 backdrop-blur-sm relative overflow-hidden">
        <div
            class="flex gap-16 animate-marquee whitespace-nowrap items-center opacity-50 grayscale hover:grayscale-0 hover:opacity-100 transition duration-500">
            @foreach (range(1, 4) as $i)
                <span class="text-2xl font-bold flex items-center gap-2 text-white italic">⚡ Laravel</span>
                <span class="text-2xl font-bold flex items-center gap-2 text-white italic">🔥 Livewire</span>
                <span class="text-2xl font-bold flex items-center gap-2 text-white italic">🎨 Tailwind</span>
                <span class="text-2xl font-bold flex items-center gap-2 text-white italic">📱 Flutter</span>
            @endforeach
        </div>
    </section>

    {{-- 3. BENTO GRID (ABOUT) --}}
    <section class="py-32 relative">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-5xl font-black mb-6">Membangun <span class="text-cyan-400">Ekosistem</span> Digital.
                    </h2>
                    <p class="text-slate-400 text-lg leading-relaxed mb-8">
                        Di Tunas Melayu Digital, kami tidak sekadar menulis kode. Kami merancang arsitektur masa depan
                        untuk bisnis Anda.
                    </p>
                    <div class="flex gap-8">
                        <div>
                            <span class="text-4xl font-bold text-white">{{ $page->stats_projects }}+</span>
                            <p class="text-sm text-slate-500 uppercase tracking-wider">Projects</p>
                        </div>
                        <div>
                            <span class="text-4xl font-bold text-white">{{ $page->stats_clients }}+</span>
                            <p class="text-sm text-slate-500 uppercase tracking-wider">Clients</p>
                        </div>
                    </div>
                </div>

                {{-- IMAGE SECTION DENGAN FALLBACK --}}
                <div data-aos="fade-left" class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-cyan-600 to-purple-600 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-1000">
                    </div>
                    <div class="relative rounded-2xl shadow-2xl w-full h-96 overflow-hidden bg-slate-800">

                        {{-- Cek apakah ada media di koleksi 'hero' --}}
                        @if ($page->hasMedia('hero'))
                            <img src="{{ $page->getFirstMediaUrl('hero') }}"
                                class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500"
                                onerror="this.onerror=null; this.src='https://via.placeholder.com/800x600/0B0F19/06B6D4?text=IMAGE_ERROR';">
                        @else
                            {{-- Fallback: Jika tidak ada media di DB --}}
                            <div
                                class="w-full h-full flex flex-col items-center justify-center bg-slate-900 border border-white/10">
                                <img src="{{ asset('images/logo.png') }}"
                                    class="w-20 opacity-20 mb-4 brightness-0 invert">
                                <span
                                    class="text-xs font-mono text-slate-500 tracking-widest uppercase">SYSTEM_AWAITING_ASSET.exe</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. SERVICES --}}
    <section id="services" class="py-24 relative bg-[#0B0F19]">
        <div class="container mx-auto px-6 relative z-10">
            <div class="mb-20">
                <h2 class="text-5xl font-black text-white">LAYANAN <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-600">PREMIUM</span>
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($services as $service)
                    <div class="group relative rounded-3xl bg-slate-900 border border-white/5 p-8 transition-all hover:border-white/20"
                        x-data="{ x: 0, y: 0 }"
                        @mousemove="x = $event.clientX - $el.getBoundingClientRect().left; y = $event.clientY - $el.getBoundingClientRect().top">

                        <div class="pointer-events-none absolute -inset-px rounded-3xl opacity-0 transition duration-300 group-hover:opacity-100"
                            :style="`background: radial-gradient(400px circle at ${x}px ${y}px, rgba(6,182,212,0.1), transparent 40%)`">
                        </div>

                        <div class="relative z-10">
                            <div
                                class="mb-6 inline-flex items-center justify-center w-14 h-14 rounded-xl bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 group-hover:bg-cyan-500 group-hover:text-white transition-all">
                                @svg($service->icon ?? 'heroicon-o-cpu-chip', 'w-7 h-7')
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-cyan-400 transition">
                                {{ $service->title }}</h3>
                            <p class="text-slate-400 text-sm leading-relaxed mb-6">{{ $service->short_description }}</p>
                            <a href="{{ route('services.show', $service->slug) }}" wire:navigate
                                class="text-cyan-400 text-xs font-bold uppercase tracking-widest hover:text-white transition">Explore
                                Mode →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ========================================== --}}
    {{-- BAGIAN 5: PORTFOLIO (STICKY STACK CARDS)   --}}
    {{-- ========================================== --}}
    <section id="portfolio" class="py-24 relative bg-[#0B0F19]">
        <div class="container mx-auto px-6">
            <div class="mb-24 md:flex md:items-end md:justify-between">
                <div class="max-w-xl">
                    <span class="text-purple-500 font-bold tracking-widest uppercase text-sm mb-2 block">Selected
                        Work</span>
                    <h2 class="text-5xl md:text-7xl font-black text-white leading-tight">BUKTI <br> <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-pink-500">KUALITAS.</span>
                    </h2>
                </div>
                <div class="hidden md:block">
                    <div
                        class="w-24 h-24 rounded-full border border-white/10 flex items-center justify-center animate-spin-slow">
                        <svg class="w-20 h-20 text-slate-500" viewBox="0 0 100 100">
                            <path id="circlePath" d="M 10, 50 a 40,40 0 1,1 80,0 a 40,40 0 1,1 -80,0"
                                fill="transparent" />
                            <text>
                                <textPath href="#circlePath" fill="currentColor"
                                    class="text-[10px] uppercase tracking-widest font-bold">
                                    Scroll Down • Scroll Down • Scroll Down •
                                </textPath>
                            </text>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-y-24">
                @foreach ($portfolios as $index => $portfolio)
                    <div class="sticky top-32 group" style="padding-top: {{ $index * 20 }}px;">
                        <div
                            class="relative w-full overflow-hidden rounded-[2.5rem] bg-[#161b22] border border-white/10 shadow-2xl transition-transform duration-500 hover:scale-[1.02] hover:-rotate-1">

                            <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[500px]">

                                <div class="p-10 md:p-16 flex flex-col justify-between relative z-10">
                                    <div>
                                        <div class="flex items-center gap-3 mb-6">
                                            <div class="w-8 h-[1px] bg-purple-500"></div>
                                            <span
                                                class="text-purple-400 uppercase tracking-widest text-xs font-bold">{{ $portfolio->client_name }}</span>
                                        </div>
                                        <h3 class="text-4xl md:text-5xl font-black text-white mb-6 leading-tight">
                                            {{ $portfolio->title }}</h3>

                                        <div class="flex flex-wrap gap-2 mb-8">
                                            @foreach (array_slice($portfolio->tech_stack ?? [], 0, 4) as $tech)
                                                <span
                                                    class="px-3 py-1 rounded-full bg-white/5 border border-white/10 text-xs font-medium text-slate-300">{{ $tech }}</span>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div>
                                        <a href="{{ route('portfolio.show', $portfolio->slug) }}" wire:navigate
                                            class="inline-flex items-center gap-4 px-8 py-4 rounded-full bg-white text-black font-bold text-lg hover:bg-purple-500 hover:text-white transition duration-300">
                                            Lihat Studi Kasus
                                            <svg class="w-5 h-5 transform -rotate-45" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                                <div class="relative h-64 lg:h-auto overflow-hidden bg-slate-800">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-[#161b22] to-transparent z-10 lg:bg-gradient-to-l">
                                    </div>
                                    @if ($portfolio->getFirstMediaUrl('portfolio_images'))
                                        <img src="{{ $portfolio->getFirstMediaUrl('portfolio_images') }}"
                                            class="w-full h-full object-cover transform scale-105 transition duration-700 group-hover:scale-100"
                                            alt="{{ $portfolio->title }}">
                                    @else
                                        <div
                                            class="w-full h-full flex items-center justify-center text-slate-600 font-mono">
                                            No Preview Image</div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-32">
                <a href="{{ route('portfolio.index') }}" wire:navigate
                    class="inline-flex items-center gap-2 text-slate-400 hover:text-white transition border-b border-transparent hover:border-white pb-1">
                    Lihat Semua Karya (Grid View) <svg class="w-4 h-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

        </div>
    </section>

    {{-- CTA SECTION (SAMA SEPERTI SEBELUMNYA) --}}
    <section class="py-32 relative flex items-center justify-center overflow-hidden bg-[#0B0F19]">
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-600/10 via-purple-600/10 to-pink-600/10 animate-pulse">
        </div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <h2 data-aos="zoom-in" class="text-5xl md:text-8xl font-black text-white mb-8 tracking-tighter">
                READY TO <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-white">TRANSFORM?</span>
            </h2>
            <p class="text-xl text-slate-300 mb-12 max-w-2xl mx-auto">
                Mari diskusikan ide gila Anda. Kami siap mengubahnya menjadi kode yang bekerja.
            </p>
            <a href="{{ route('contact') }}" wire:navigate class="relative inline-flex group">
                <div
                    class="absolute transition-all duration-1000 opacity-70 -inset-px bg-gradient-to-r from-[#44BCFF] via-[#FF44EC] to-[#FF675E] rounded-xl blur-lg group-hover:opacity-100 group-hover:-inset-1 group-hover:duration-200 animate-tilt">
                </div>
                <button
                    class="relative inline-flex items-center justify-center px-12 py-6 text-lg font-bold text-white transition-all duration-200 bg-slate-900 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                    Mulai Proyek Sekarang
                </button>
            </a>
        </div>
    </section>

    {{-- CSS Tambahan untuk Marquee & Spin --}}
    <style>
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-marquee {
            animation: marquee 30s linear infinite;
        }

        .animate-spin-slow {
            animation: spin 15s linear infinite;
        }
    </style>
</div>
