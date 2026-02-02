<div class="bg-[#0B0F19] text-white selection:bg-purple-500 selection:text-white" x-data="{ scroll: 0 }"
    @scroll.window="scroll = (window.pageYOffset / (document.body.scrollHeight - window.innerHeight)) * 100">

    {{-- 1. READING PROGRESS BAR (TOP) --}}
    <div class="fixed top-0 left-0 h-1 bg-gradient-to-r from-purple-500 to-pink-500 z-50 transition-all duration-100"
        :style="'width: ' + scroll + '%'"></div>

    {{-- ========================================== --}}
    {{-- 2. HERO HEADER (IMMERSIVE) --}}
    {{-- ========================================== --}}
    <section class="relative h-[80vh] min-h-[600px] flex items-end pb-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            @if ($portfolio->getFirstMediaUrl('portfolio_images'))
                <img src="{{ $portfolio->getFirstMediaUrl('portfolio_images') }}"
                    class="w-full h-full object-cover opacity-50 grayscale hover:grayscale-0 transition duration-[2s] ease-out scale-105"
                    alt="{{ $portfolio->title }}">
            @else
                <div class="w-full h-full bg-slate-800"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-[#0B0F19] via-[#0B0F19]/60 to-transparent"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div data-aos="fade-up">
                <div class="flex items-center gap-4 mb-6">
                    <span
                        class="px-3 py-1 border border-white/20 rounded-full text-xs font-mono uppercase tracking-widest text-purple-400 bg-black/30 backdrop-blur">
                        Case Study
                    </span>
                    <span class="h-px w-12 bg-white/20"></span>
                    <span
                        class="text-slate-300 font-mono text-xs uppercase tracking-widest">{{ $portfolio->created_at->format('F Y') }}</span>
                </div>

                <h1 class="text-5xl md:text-8xl font-black tracking-tighter leading-none mb-6">
                    {{ $portfolio->title }}
                </h1>

                <p class="text-xl md:text-2xl text-slate-400 max-w-2xl font-light">
                    Solusi digital untuk <span
                        class="text-white border-b border-purple-500">{{ $portfolio->client_name }}</span>.
                </p>
            </div>
        </div>
    </section>


    {{-- ========================================== --}}
    {{-- 3. PROJECT INFO BAR (STICKY) --}}
    {{-- ========================================== --}}
    <div class="sticky top-0 z-40 bg-[#0B0F19]/80 backdrop-blur-xl border-y border-white/5">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-white/5">

                <div class="py-6 px-4 md:px-8">
                    <span class="block text-xs text-slate-500 uppercase tracking-widest mb-1">Client</span>
                    <span class="font-bold text-white">{{ $portfolio->client_name }}</span>
                </div>

                <div class="py-6 px-4 md:px-8">
                    <span class="block text-xs text-slate-500 uppercase tracking-widest mb-1">Services</span>
                    <span class="font-bold text-white">Web Development</span>
                </div>

                <div class="col-span-2 md:col-span-2 py-6 px-4 md:px-8 flex flex-col justify-center">
                    <span class="block text-xs text-slate-500 uppercase tracking-widest mb-2">Technologies</span>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($portfolio->tech_stack ?? [] as $tech)
                            <span
                                class="text-xs font-mono px-2 py-1 bg-white/5 border border-white/10 rounded text-purple-300">
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>


    {{-- ========================================== --}}
    {{-- 4. THE NARRATIVE (CONTENT) --}}
    {{-- ========================================== --}}
    <section class="py-32 relative">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">

                <div class="lg:col-span-4">
                    <div class="sticky top-40">
                        <h3 class="text-2xl font-bold mb-6 text-white">Project Overview</h3>
                        <p class="text-slate-400 leading-relaxed mb-8">
                            {{ $portfolio->description ?? 'Sebuah proyek ambisius yang bertujuan untuk mendigitalisasi proses bisnis klien melalui pendekatan teknologi modern dan desain yang user-centric.' }}
                        </p>

                        @if ($portfolio->url)
                            <a href="{{ $portfolio->url }}" target="_blank"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-white text-black font-bold rounded-full hover:bg-purple-500 hover:text-white transition duration-300 group">
                                <span>Visit Live Site</span>
                                <svg class="w-5 h-5 group-hover:rotate-45 transition transform" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="lg:col-span-8 space-y-24">

                    <div data-aos="fade-up">
                        <span class="text-purple-500 font-bold text-8xl opacity-10 absolute -ml-10 -mt-10">01</span>
                        <h2 class="text-3xl md:text-4xl font-black mb-6 relative">The Challenge</h2>
                        <div class="prose prose-lg prose-invert text-slate-400">
                            <p>
                                Klien menghadapi tantangan dalam skalabilitas sistem lama mereka. Pengguna mengalami
                                loading lambat dan UI yang tidak intuitif, menyebabkan penurunan konversi sebesar 20%
                                setiap bulannya. Mereka membutuhkan perombakan total.
                            </p>
                        </div>
                    </div>

                    <div data-aos="fade-up" class="relative group cursor-pointer">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-600 to-blue-600 blur-[60px] opacity-20 group-hover:opacity-40 transition duration-700">
                        </div>

                        <div
                            class="relative mx-auto bg-gray-900 rounded-t-xl border-[10px] border-gray-800 border-b-0 shadow-2xl w-full max-w-4xl">
                            <div
                                class="absolute top-0 left-1/2 transform -translate-x-1/2 w-24 h-4 bg-gray-800 rounded-b-lg flex justify-center items-center z-20">
                                <div class="w-1.5 h-1.5 bg-black rounded-full border border-gray-700"></div>
                            </div>

                            <div class="rounded-lg overflow-hidden bg-black aspect-video relative">
                                @if ($portfolio->getFirstMediaUrl('portfolio_images'))
                                    <img src="{{ $portfolio->getFirstMediaUrl('portfolio_images') }}"
                                        class="w-full h-full object-cover" alt="App Screenshot">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-700">Screen
                                        Preview</div>
                                @endif
                            </div>
                        </div>
                        <div
                            class="relative mx-auto bg-gray-800 rounded-b-xl h-[20px] max-w-[calc(100%+20px)] shadow-xl flex justify-center">
                            <div class="w-32 h-2 bg-gray-700 rounded-b-lg"></div>
                        </div>
                    </div>

                    <div data-aos="fade-up">
                        <span class="text-blue-500 font-bold text-8xl opacity-10 absolute -ml-10 -mt-10">02</span>
                        <h2 class="text-3xl md:text-4xl font-black mb-8 relative">The Result</h2>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                            <div class="p-6 rounded-2xl bg-white/5 border border-white/10">
                                <span class="block text-4xl font-black text-green-400 mb-2">+400%</span>
                                <span class="text-sm text-slate-400">Peningkatan Kecepatan</span>
                            </div>
                            <div class="p-6 rounded-2xl bg-white/5 border border-white/10">
                                <span class="block text-4xl font-black text-blue-400 mb-2">99.9%</span>
                                <span class="text-sm text-slate-400">Uptime Server</span>
                            </div>
                            <div class="p-6 rounded-2xl bg-white/5 border border-white/10">
                                <span class="block text-4xl font-black text-purple-400 mb-2">5/5</span>
                                <span class="text-sm text-slate-400">User Satisfaction</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    {{-- ========================================== --}}
    {{-- 5. NEXT PROJECT NAVIGATION --}}
    {{-- ========================================== --}}
    @if ($nextPortfolio)
        <a href="{{ route('portfolio.show', $nextPortfolio->slug) }}" wire:navigate
            class="block relative group overflow-hidden h-[50vh] min-h-[400px]">
            <div class="absolute inset-0">
                @if ($nextPortfolio->getFirstMediaUrl('portfolio_images'))
                    <img src="{{ $nextPortfolio->getFirstMediaUrl('portfolio_images') }}"
                        class="w-full h-full object-cover transition duration-1000 transform group-hover:scale-110 group-hover:rotate-1"
                        alt="Next">
                @else
                    <div class="w-full h-full bg-slate-900"></div>
                @endif
                <div class="absolute inset-0 bg-black/70 group-hover:bg-black/50 transition duration-500"></div>
            </div>

            <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6 z-10">
                <span
                    class="text-purple-400 font-mono text-sm tracking-[0.3em] uppercase mb-4 opacity-70 group-hover:opacity-100 transition">Next
                    Case Study</span>
                <h2
                    class="text-5xl md:text-8xl font-black text-white mb-2 group-hover:translate-x-4 transition duration-500">
                    {{ $nextPortfolio->title }}
                </h2>
                <div
                    class="mt-8 px-8 py-3 rounded-full border border-white/30 text-white group-hover:bg-white group-hover:text-black transition duration-300">
                    View Project
                </div>
            </div>
        </a>
    @endif

</div>
