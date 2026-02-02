<div class="bg-[#0B0F19] text-white min-h-screen selection:bg-purple-500 selection:text-white">

    {{-- ========================================== --}}
    {{-- 1. HEADER: CINEMATIC TITLE --}}
    {{-- ========================================== --}}
    <section class="relative pt-40 pb-20 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none">
            <div
                class="absolute top-[-20%] left-[10%] w-[600px] h-[600px] bg-purple-900/20 rounded-full blur-[150px] animate-pulse">
            </div>
            <div class="absolute bottom-[-20%] right-[10%] w-[500px] h-[500px] bg-blue-900/20 rounded-full blur-[150px]">
            </div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl">
                <span data-aos="fade-right"
                    class="block text-purple-500 font-mono text-sm tracking-[0.3em] uppercase mb-4">
                    Our Masterpieces
                </span>
                <h1 data-aos="fade-up" class="text-6xl md:text-9xl font-black tracking-tighter leading-[0.9] mb-8">
                    SELECTED <br>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">WORK.</span>
                </h1>
                <p data-aos="fade-up" data-aos-delay="200"
                    class="text-xl text-slate-400 max-w-xl leading-relaxed border-l-4 border-purple-500 pl-6">
                    Kumpulan studi kasus di mana kami mengubah masalah kompleks menjadi solusi digital yang elegan dan
                    berdampak.
                </p>
            </div>
        </div>
    </section>


    {{-- ========================================== --}}
    {{-- 2. FILTER BAR (STICKY GLASS) --}}
    {{-- ========================================== --}}
    <div @mouseenter="$store.sfx.playHover()" class="sticky top-20 z-40 mb-20 pointer-events-none">
        <div class="container mx-auto px-6">
            <div class="inline-flex flex-wrap items-center gap-2 p-2 bg-[#0F1623]/80 backdrop-blur-xl border border-white/10 rounded-full shadow-2xl pointer-events-auto transition-transform hover:scale-105"
                data-aos="zoom-in">

                <button wire:click="setFilter('All')"
                    class="px-6 py-2 rounded-full text-sm font-bold transition-all duration-300 {{ $filter === 'All' ? 'bg-white text-black shadow-lg scale-105' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                    All
                </button>

                @foreach ($tags as $tag)
                    <button @click="$store.sfx.playClick()" wire:key="filter-{{ $tag }}"
                        wire:click="setFilter('{{ $tag }}')"
                        class="px-6 py-2 rounded-full text-sm font-bold transition-all duration-300 {{ $filter === $tag ? 'bg-purple-600 text-white shadow-lg scale-105 shadow-purple-500/30' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        {{ $tag }}
                    </button>
                @endforeach

            </div>
        </div>
    </div>


    {{-- ========================================== --}}
    {{-- 3. THE GALLERY (STAGGERED GRID) --}}
    {{-- ========================================== --}}
    <section class="pb-32 relative z-10">
        <div class="container mx-auto px-6">

            @if ($portfolios->isEmpty())
                <div class="text-center py-20">
                    <p class="text-slate-500 text-xl">Belum ada project di kategori ini.</p>
                    <button wire:click="setFilter('All')" class="mt-4 text-purple-400 underline">Lihat semua</button>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-24">

                    @foreach ($portfolios as $index => $portfolio)
                        <div wire:key="portfolio-item-{{ $portfolio->id }}"
                            class="group relative {{ $index % 2 == 1 ? 'md:mt-32' : '' }}"
                            @mouseenter="$store.sfx.playHover()" data-aos="fade-up"
                            data-aos-delay="{{ ($index % 2) * 200 }}" data-aos-duration="1000">

                            <a href="{{ route('portfolio.show', $portfolio->slug) }}" wire:navigate
                                class="block relative w-full aspect-[4/3] overflow-hidden rounded-[2rem] bg-slate-800 border border-white/5">

                                <div
                                    class="absolute inset-0 bg-slate-900/40 group-hover:bg-transparent transition-colors duration-700 z-10 mix-blend-multiply">
                                </div>

                                @if ($portfolio->hasMedia('portfolio_images'))
                                    <img src="{{ $portfolio->getFirstMediaUrl('portfolio_images') }}"
                                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 scale-105 group-hover:scale-100 transition-all duration-1000 ease-out"
                                        alt="{{ $portfolio->title }}" loading="lazy"
                                        onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden'); this.nextElementSibling.classList.add('flex');">
                                    <div
                                        class="hidden w-full h-full absolute inset-0 items-center justify-center bg-slate-800 text-slate-600 font-mono text-sm">
                                        Image Unavailable
                                    </div>
                                @else
                                    <div
                                        class="w-full h-full flex items-center justify-center text-slate-600 bg-slate-800 font-mono text-sm">
                                        No Preview</div>
                                @endif

                                <div
                                    class="absolute top-6 right-6 z-20 opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-500">
                                    <div
                                        class="w-16 h-16 rounded-full bg-white text-black flex items-center justify-center shadow-2xl font-bold text-xs rotate-12 group-hover:rotate-0 transition">
                                        VIEW
                                    </div>
                                </div>
                            </a>

                            <div class="mt-8 relative">
                                <div
                                    class="w-0 group-hover:w-full h-px bg-gradient-to-r from-purple-500 to-transparent transition-all duration-700 ease-in-out mb-6">
                                </div>

                                <div class="flex justify-between items-end">
                                    <div>
                                        <span
                                            class="text-purple-500 font-mono text-xs uppercase tracking-widest mb-2 block">
                                            {{ $portfolio->client_name }}
                                        </span>
                                        <h2
                                            class="text-3xl md:text-4xl font-bold text-white group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-white group-hover:to-purple-400 transition-all duration-300">
                                            <a href="{{ route('portfolio.show', $portfolio->slug) }}" wire:navigate>
                                                {{ $portfolio->title }}
                                            </a>
                                        </h2>
                                    </div>

                                    <div
                                        class="hidden md:block opacity-0 group-hover:opacity-100 transform -translate-x-10 group-hover:translate-x-0 transition-all duration-500">
                                        <svg class="w-8 h-8 text-purple-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </div>
                                </div>

                                <div
                                    class="mt-4 flex flex-wrap gap-2 opacity-60 group-hover:opacity-100 transition duration-500">
                                    @foreach ($portfolio->tech_stack ?? [] as $tech)
                                        <span
                                            class="text-xs text-slate-400 border border-slate-700 px-2 py-1 rounded hover:border-purple-500 hover:text-purple-400 transition cursor-default">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            @endif
        </div>
    </section>


    {{-- ========================================== --}}
    {{-- 4. FOOTER CTA --}}
    {{-- ========================================== --}}
    <section class="py-32 relative overflow-hidden bg-purple-900/10 border-t border-white/5">
        <div class="container mx-auto px-6 text-center relative z-10">
            <h2 class="text-4xl md:text-6xl font-black mb-8">Punya Project Ambisius?</h2>
            <p class="text-slate-400 max-w-2xl mx-auto mb-12 text-lg">
                Kami siap membantu Anda mewujudkan ide tersebut menjadi produk digital kelas dunia.
            </p>
            <a href="{{ route('contact') }}" wire:navigate
                class="inline-flex items-center gap-3 px-10 py-5 bg-white text-black font-bold text-lg rounded-full hover:bg-purple-500 hover:text-white hover:scale-105 transition-all duration-300 shadow-[0_0_30px_rgba(255,255,255,0.2)]">
                Start a Project
            </a>
        </div>
    </section>

</div>
