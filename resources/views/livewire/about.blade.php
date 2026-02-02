<div class="bg-[#0B0F19] text-white selection:bg-cyan-500 selection:text-white overflow-x-hidden relative"
    x-data="{
        mouseMove(e) {
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;
            document.documentElement.style.setProperty('--mouse-x', x);
            document.documentElement.style.setProperty('--mouse-y', y);
        }
    }">

    {{-- GLOBAL BACKGROUND EFFECTS (Shooting Stars & Particles) --}}
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="stars"></div>
        <div class="stars2"></div>

        <div
            class="absolute top-[-10%] left-[-10%] w-[800px] h-[800px] bg-purple-900/20 rounded-full blur-[120px] animate-float-slow">
        </div>
        <div
            class="absolute bottom-[-10%] right-[-10%] w-[600px] h-[600px] bg-cyan-900/20 rounded-full blur-[120px] animate-float-delayed">
        </div>

        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
    </div>

    {{-- ========================================== --}}
    {{-- 1. HERO SECTION (FALLING LETTERS EFFECT)   --}}
    {{-- ========================================== --}}
    <section class="relative min-h-screen flex items-center pt-20 overflow-hidden" @mousemove="mouseMove">

        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <div class="relative">
                    <div data-aos="fade-right" class="mb-4 flex items-center gap-3">
                        <span class="h-px w-8 bg-cyan-500"></span>
                        <span class="text-cyan-400 font-mono text-xs uppercase tracking-[0.3em] animate-pulse">Identity
                            Log</span>
                    </div>

                    <h1 class="text-6xl md:text-8xl font-black mb-8 leading-tight perspective-text">
                        @foreach (str_split($page->hero_title) as $index => $letter)
                            {{-- Jika spasi, beri margin --}}
                            @if ($letter === ' ')
                                <span class="inline-block w-4"></span>
                            @else
                                <span
                                    class="inline-block animate-fall-in opacity-0 text-transparent bg-clip-text bg-gradient-to-b from-white to-slate-400 hover:text-cyan-400 transition-colors cursor-default"
                                    style="animation-delay: {{ $index * 100 }}ms; animation-fill-mode: forwards;">
                                    {{ $letter }}
                                </span>
                            @endif
                        @endforeach
                    </h1>

                    <div class="prose prose-lg prose-invert text-slate-400 mb-8 border-l-4 border-cyan-500/50 pl-6 backdrop-blur-sm bg-white/5 p-6 rounded-r-xl"
                        data-aos="fade-up" data-aos-delay="500">
                        <p>{{ $page->hero_subtitle }}</p>
                    </div>

                    <div class="flex gap-12 mt-12" data-aos="fade-up" data-aos-delay="700">
                        <div class="group cursor-pointer">
                            <span
                                class="block text-5xl font-black text-white group-hover:text-cyan-400 transition duration-300 transform group-hover:-translate-y-2">{{ date('Y') - $page->founded_year }}<span
                                    class="text-sm align-top text-slate-500">+</span></span>
                            <span
                                class="text-xs text-slate-500 uppercase tracking-widest group-hover:tracking-[0.2em] transition-all">Years
                                Experience</span>
                        </div>
                        <div class="w-px h-16 bg-gradient-to-b from-transparent via-white/20 to-transparent"></div>
                        <div class="group cursor-pointer">
                            <span
                                class="block text-5xl font-black text-white group-hover:text-purple-400 transition duration-300 transform group-hover:-translate-y-2">100<span
                                    class="text-sm align-top text-slate-500">%</span></span>
                            <span
                                class="text-xs text-slate-500 uppercase tracking-widest group-hover:tracking-[0.2em] transition-all">Project
                                Success</span>
                        </div>
                    </div>
                </div>

                <div class="relative perspective-container" data-aos="fade-left">
                    <div
                        class="absolute -inset-10 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-full blur-3xl opacity-20 animate-pulse">
                    </div>

                    <div class="relative transform transition-transform duration-200 ease-out hover:scale-[1.02]"
                        style="transform: rotateY(calc(var(--mouse-x) * 10deg)) rotateX(calc(var(--mouse-y) * -10deg));">

                        @if ($page->getFirstMediaUrl('about_hero'))
                            <img src="{{ $page->getFirstMediaUrl('about_hero') }}"
                                class="relative rounded-3xl shadow-2xl border border-white/10 w-full object-cover h-[600px] z-10"
                                alt="About Us">
                        @else
                            <div
                                class="relative rounded-3xl shadow-2xl border border-white/10 w-full h-[600px] bg-slate-800 flex items-center justify-center z-10">
                                No Image</div>
                        @endif

                        <div
                            class="absolute -bottom-10 -left-10 z-20 bg-[#0F1623]/90 backdrop-blur-xl border border-cyan-500/30 p-6 rounded-2xl shadow-[0_0_30px_rgba(6,182,212,0.3)] animate-float">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center text-black font-bold">
                                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Powering
                                    </p>
                                    <p class="text-xl font-black text-white">FUTURE</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ========================================== --}}
    {{-- 2. VISION & MISSION (GLASS TILT CARDS)     --}}
    {{-- ========================================== --}}
    <section class="py-32 relative">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <div class="group relative perspective-1000" data-aos="fade-up">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-3xl blur-xl opacity-0 group-hover:opacity-30 transition duration-500">
                    </div>
                    <div
                        class="relative bg-white/5 border border-white/10 p-12 rounded-3xl h-full backdrop-blur-md transform transition duration-500 hover:rotate-x-2 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-cyan-900/50 rounded-2xl flex items-center justify-center text-cyan-400 mb-8 border border-cyan-500/30 shadow-[0_0_15px_rgba(6,182,212,0.2)]">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <h2 class="text-4xl font-black text-white mb-6 tracking-tight">VISI <span
                                class="text-cyan-400">KAMI</span></h2>
                        <p class="text-xl text-slate-300 font-light leading-relaxed">"{{ $page->vision }}"</p>
                    </div>
                </div>

                <div class="group relative perspective-1000" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-3xl blur-xl opacity-0 group-hover:opacity-30 transition duration-500">
                    </div>
                    <div
                        class="relative bg-white/5 border border-white/10 p-12 rounded-3xl h-full backdrop-blur-md transform transition duration-500 hover:rotate-x-2 hover:-translate-y-2">
                        <div
                            class="w-16 h-16 bg-purple-900/50 rounded-2xl flex items-center justify-center text-purple-400 mb-8 border border-purple-500/30 shadow-[0_0_15px_rgba(168,85,247,0.2)]">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h2 class="text-4xl font-black text-white mb-6 tracking-tight">MISI <span
                                class="text-purple-400">KAMI</span></h2>
                        <ul class="space-y-4">
                            @foreach (explode("\n", $page->mission) as $mission)
                                @if (trim($mission) != '')
                                    <li class="flex items-start gap-4 group/item">
                                        <span
                                            class="mt-1.5 w-2 h-2 rounded-full bg-purple-500 group-hover/item:shadow-[0_0_10px_#a855f7] transition"></span>
                                        <p class="text-slate-300 text-lg">{{ $mission }}</p>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ========================================== --}}
    {{-- 3. TEAM SECTION (INFINITE WALKING MARQUEE) --}}
    {{-- ========================================== --}}
    <section class="py-24 relative overflow-hidden bg-[#0F1623]">
        <div
            class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-cyan-500 to-transparent opacity-50">
        </div>
        <div
            class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-purple-500 to-transparent opacity-50">
        </div>

        <div class="container mx-auto px-6 mb-16 text-center relative z-10">
            <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400 font-bold tracking-widest uppercase text-sm mb-2 block">The
                Masterminds</span>
            <h2 class="text-5xl md:text-7xl font-black text-white">MEET THE <span class="text-white">SQUAD</span></h2>
        </div>

        <div class="relative w-full overflow-hidden py-10">
            <div
                class="absolute left-0 top-0 bottom-0 w-20 md:w-40 bg-gradient-to-r from-[#0F1623] to-transparent z-20 pointer-events-none">
            </div>
            <div
                class="absolute right-0 top-0 bottom-0 w-20 md:w-40 bg-gradient-to-l from-[#0F1623] to-transparent z-20 pointer-events-none">
            </div>

            <div class="flex gap-8 animate-marquee hover:pause w-max px-4">
                @foreach (range(1, 4) as $loop)
                    {{-- Loop 4 kali agar cukup panjang --}}
                    @foreach ($teams as $team)
                        <div class="relative group w-[300px] md:w-[350px] shrink-0">
                            <div
                                class="relative h-[450px] rounded-[2rem] overflow-hidden bg-slate-800 border border-white/5 transition-all duration-500 group-hover:scale-105 group-hover:border-cyan-500/50 group-hover:shadow-[0_0_40px_rgba(6,182,212,0.2)]">

                                @if ($team->getFirstMediaUrl('avatar'))
                                    <img src="{{ $team->getFirstMediaUrl('avatar') }}"
                                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-700"
                                        alt="{{ $team->name }}">
                                @else
                                    <div
                                        class="w-full h-full flex items-center justify-center bg-slate-700 text-slate-500">
                                        No Photo</div>
                                @endif

                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition duration-500">
                                </div>

                                <div
                                    class="absolute bottom-0 left-0 w-full p-8 transform translate-y-4 group-hover:translate-y-0 transition duration-500">
                                    <div class="mb-4">
                                        <p class="text-cyan-400 text-xs font-bold uppercase tracking-widest mb-1">
                                            {{ $team->position }}</p>
                                        <h3 class="text-3xl font-black text-white leading-none">{{ $team->name }}
                                        </h3>
                                    </div>

                                    <div
                                        class="h-0 group-hover:h-auto overflow-hidden transition-all duration-500 ease-in-out opacity-0 group-hover:opacity-100">
                                        <p
                                            class="text-sm text-slate-300 border-l-2 border-cyan-500 pl-3 mb-4 line-clamp-3">
                                            {{ $team->bio }}
                                        </p>

                                        <div class="flex gap-3">
                                            <a href="#"
                                                class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-cyan-500 hover:text-black transition"><svg
                                                    class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                                </svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    {{-- ========================================== --}}
    {{-- 4. CORE VALUES (GLOW GRID)                 --}}
    {{-- ========================================== --}}
    <section class="py-24 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-white">CORE <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-400">VALUES</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach ($page->core_values ?? [] as $index => $value)
                    <div class="group relative p-8 rounded-2xl bg-white/5 border border-white/5 overflow-hidden transition-all duration-300 hover:bg-white/10"
                        data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-cyan-500/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                        </div>

                        <div class="relative z-10 text-center">
                            <div
                                class="w-16 h-16 mx-auto bg-slate-900 rounded-full flex items-center justify-center text-white mb-6 shadow-[0_0_20px_rgba(255,255,255,0.1)] group-hover:scale-110 group-hover:shadow-[0_0_30px_rgba(6,182,212,0.4)] transition duration-300">
                                @if (isset($value['icon']))
                                    @svg($value['icon'], 'w-8 h-8')
                                @else
                                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-lg font-bold text-white mb-2">{{ $value['title'] ?? 'Value' }}</h3>
                            <p class="text-sm text-slate-400">{{ $value['desc'] ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CSS CUSTOM ANIMATIONS --}}
    <style>
        /* 1. Falling Letters Animation */
        @keyframes fall-in {
            0% {
                transform: translateY(-50px) rotate(-10deg);
                opacity: 0;
                filter: blur(10px);
            }

            100% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                filter: blur(0);
            }
        }

        .animate-fall-in {
            animation: fall-in 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        /* 2. Marquee Animation (Left to Right Illusion - Moving Content Left) */
        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }

            /* Geser setengah karena konten diduplikasi */
        }

        .animate-marquee {
            animation: marquee 30s linear infinite;
            /* Kecepatan jalan */
        }

        .hover\:pause:hover {
            animation-play-state: paused;
        }

        /* 3. Shooting Stars */
        .stars,
        .stars2 {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            display: block;
            background: url('http://www.script-tutorials.com/demos/360/images/stars.png') repeat top center;
            z-index: 0;
        }

        .stars {
            animation: move-twink-back 200s linear infinite;
        }

        .stars2 {
            background: transparent url('http://www.script-tutorials.com/demos/360/images/twinkling.png') repeat top center;
            animation: move-twink-back 100s linear infinite;
            z-index: 1;
            opacity: 0.5;
        }

        @keyframes move-twink-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: -10000px 5000px;
            }
        }

        /* 4. Floating & Blobs */
        .animate-float-slow {
            animation: blob-bounce 20s infinite ease-in-out;
        }

        .animate-float-delayed {
            animation: blob-bounce 25s infinite ease-in-out reverse;
        }

        @keyframes blob-bounce {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(50px, -50px) scale(1.1);
            }
        }
    </style>
</div>
