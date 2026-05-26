<div class="bg-[#0B0F19] text-white selection:bg-cyan-500 selection:text-white overflow-x-hidden relative"
    x-data="{
        scroll: 0,
        progress: 0,
        updateProgress() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            this.progress = (winScroll / height) * 100;
        }
    }" @scroll.window="updateProgress()">

    {{-- 1. READING PROGRESS BAR --}}
    <div class="fixed top-0 left-0 w-full h-1 z-[100] pointer-events-none">
        <div class="h-full bg-gradient-to-r from-cyan-500 via-purple-500 to-pink-500 transition-all duration-150"
            :style="`width: ${progress}%`"></div>
    </div>

    {{-- 2. HERO HEADER (IMMERSIVE GLOW) --}}
    <section class="relative h-[60vh] min-h-[500px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div
                class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-cyan-900/40 via-[#0B0F19] to-[#0B0F19]">
            </div>
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:32px_32px] opacity-50">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <div data-aos="fade-down"
                class="flex items-center justify-center gap-2 text-sm text-slate-400 mb-8 font-mono uppercase tracking-widest">
                <a href="{{ route('home') }}" wire:navigate class="hover:text-white transition">Home</a>
                <span class="text-cyan-500">/</span>
                <a href="{{ route('services.index') }}" wire:navigate class="hover:text-white transition">Services</a>
                <span class="text-cyan-500">/</span>
                <span class="text-cyan-400">{{ $service->title }}</span>
            </div>

            <div data-aos="zoom-in" class="mb-8 flex justify-center">
                <div
                    class="relative w-24 h-24 flex items-center justify-center bg-slate-800/50 rounded-3xl border border-white/10 shadow-[0_0_50px_rgba(6,182,212,0.3)] backdrop-blur-md animate-float">
                    @svg($service->icon, 'w-12 h-12 text-cyan-400')
                    <div class="absolute inset-0 border border-cyan-500/30 rounded-3xl blur-sm"></div>
                </div>
            </div>

            <h1 data-aos="fade-up" class="text-5xl md:text-7xl font-black tracking-tight mb-4 uppercase">
                {{ $service->title }}
            </h1>

            <p data-aos="fade-up" data-aos-delay="100" class="text-xl text-slate-400 max-w-2xl mx-auto">
                {{ $service->short_description }}
            </p>
        </div>
    </section>

    {{-- 3. MAIN CONTENT GRID --}}
    <section class="relative py-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

                {{-- KOLOM KIRI: KONTEN UTAMA --}}
                <div class="lg:col-span-8">
                    {{-- Featured Image --}}
                    <div class="rounded-3xl overflow-hidden mb-12 border border-white/10 shadow-2xl relative group"
                        data-aos="fade-up">
                        @if ($service->getFirstMediaUrl('service_images'))
                            <img src="{{ $service->getFirstMediaUrl('service_images') }}"
                                class="w-full h-[450px] object-cover group-hover:scale-105 transition duration-700"
                                alt="{{ $service->title }}">
                        @else
                            <div
                                class="w-full h-80 bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center">
                                <h2 class="text-4xl font-bold text-white/5 uppercase tracking-widest select-none">
                                    Overview</h2>
                            </div>
                        @endif
                    </div>

                    {{-- Main Article Content --}}
                    <div class="prose prose-lg prose-invert prose-cyan max-w-none
                                prose-headings:font-bold prose-headings:tracking-tight
                                prose-p:text-slate-300 prose-p:leading-relaxed
                                prose-a:text-cyan-400 hover:prose-a:text-cyan-300
                                prose-blockquote:border-l-cyan-500 prose-blockquote:bg-white/5 prose-blockquote:py-2 prose-blockquote:rounded-r-xl
                                prose-li:marker:text-cyan-500"
                        data-aos="fade-up">

                        {!! $service->full_content !!}
                    </div>

                    {{-- FAQ SECTION (DYNAMIC) --}}
                    @if ($service->faqs && count($service->faqs) > 0)
                        <div class="mt-16 pt-16 border-t border-white/10" x-data="{ activeFaq: null }">
                            <h3 class="text-3xl font-black mb-8">FAQ <span class="text-cyan-500">.</span></h3>
                            <div class="space-y-4">
                                @foreach ($service->faqs as $index => $faq)
                                    <div class="border border-white/10 rounded-2xl bg-white/5 transition-all duration-300"
                                        :class="activeFaq === {{ $index }} ? 'border-cyan-500/50 bg-cyan-500/5' : ''">
                                        <button
                                            @click="activeFaq = (activeFaq === {{ $index }} ? null : {{ $index }})"
                                            class="flex items-center justify-between w-full p-6 text-left transition">
                                            <span class="font-bold text-lg"
                                                :class="activeFaq === {{ $index }} ? 'text-cyan-400' : 'text-slate-200'">
                                                {{ $faq['question'] }}
                                            </span>
                                            <svg class="w-5 h-5 transform transition-transform duration-300"
                                                :class="activeFaq === {{ $index }} ? 'rotate-180 text-cyan-400' :
                                                    'text-slate-500'"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                        <div x-show="activeFaq === {{ $index }}" x-collapse
                                            class="p-6 pt-0 text-slate-400 leading-relaxed border-t border-white/5 mt-2">
                                            {{ $faq['answer'] }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- KOLOM KANAN: STICKY SIDEBAR --}}
                <div class="lg:col-span-4 relative">
                    <div class="sticky top-28 space-y-8">

                        {{-- Conversion Card --}}
                        <div class="relative p-[1px] rounded-3xl bg-gradient-to-b from-cyan-500/50 to-purple-600/50 group"
                            data-aos="fade-left">
                            <div
                                class="absolute inset-0 bg-gradient-to-b from-cyan-500 to-purple-600 blur-lg opacity-20 group-hover:opacity-40 transition duration-500">
                            </div>
                            <div class="relative rounded-[23px] bg-[#0F1623] p-8 text-center overflow-hidden">
                                {{-- Background Pattern --}}
                                <div
                                    class="absolute inset-0 opacity-10 pointer-events-none bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-cyan-500 via-transparent to-transparent">
                                </div>

                                <h3 class="text-2xl font-bold text-white mb-2 relative z-10">Transformasi Bisnis Anda
                                    Sekarang</h3>
                                <p class="text-slate-400 text-sm mb-8 relative z-10">Siap untuk membangun ekosistem
                                    digital yang tak terkalahkan?</p>

                                @php
                                    $waText = urlencode(
                                        $service->wa_message ??
                                            'Halo Tunas Digital, saya tertarik dengan layanan ' . $service->title,
                                    );
                                @endphp
                                <a href="https://wa.me/6281234567890?text={{ $waText }}" target="_blank"
                                    @mouseenter="$store.sfx.playHover()"
                                    class="block w-full py-4 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl transition shadow-[0_0_20px_rgba(8,145,178,0.4)] mb-4 relative z-10">
                                    Mulai Konsultasi Gratis
                                </a>

                                <div
                                    class="flex items-center justify-center gap-2 text-xs text-slate-500 relative z-10 font-mono">
                                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                    <span>AGENTS ONLINE</span>
                                </div>
                            </div>
                        </div>

                        {{-- Tech Stack Card (DYNAMIC) --}}
                        @if ($service->tech_stack && count($service->tech_stack) > 0)
                            <div class="rounded-3xl border border-white/10 bg-white/5 p-8 backdrop-blur-md"
                                data-aos="fade-left" data-aos-delay="100">
                                <h4 class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-500 mb-6">Cutting-Edge
                                    Tech Stack</h4>
                                <div class="flex flex-wrap gap-3">
                                    @foreach ($service->tech_stack as $tech)
                                        <span
                                            class="px-4 py-2 bg-slate-900/80 rounded-xl text-xs font-mono text-slate-300 border border-white/5 hover:border-cyan-500/50 hover:text-cyan-400 transition duration-300">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Trust Badge --}}
                        <div class="p-8 rounded-3xl bg-gradient-to-br from-slate-900 to-black border border-white/5"
                            data-aos="fade-left" data-aos-delay="200">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 rounded-full bg-cyan-500/10 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-cyan-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <span class="text-sm font-bold">Guaranteed Delivery</span>
                            </div>
                            <p class="text-xs text-slate-500 leading-relaxed">Setiap baris kode kami melewati standar
                                kualitas tinggi dan pengujian menyeluruh.</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- 4. NEXT PROJECT NAVIGATION (DYNAMNIC) --}}
    @if ($nextService)
        <section class="py-32 border-t border-white/5 bg-[#0F1623] relative overflow-hidden group">
            {{-- Decorative bg --}}
            <div
                class="absolute top-0 right-0 w-96 h-96 bg-cyan-500/5 rounded-full blur-[100px] group-hover:bg-cyan-500/10 transition duration-700">
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="flex flex-col items-center text-center">
                    <span class="text-slate-500 uppercase tracking-[0.4em] text-xs font-bold mb-6">The Journey
                        Continues</span>

                    <a href="{{ route('services.show', $nextService->slug) }}" wire:navigate class="group/link">
                        <h2
                            class="text-4xl md:text-7xl font-black text-white group-hover/link:text-transparent group-hover/link:bg-clip-text group-hover/link:bg-gradient-to-r group-hover/link:from-cyan-400 group-hover/link:to-purple-600 transition-all duration-500 uppercase">
                            {{ $nextService->title }}
                        </h2>
                        <div
                            class="mt-8 flex justify-center items-center gap-3 text-cyan-400 opacity-0 transform translate-y-4 group-hover/link:opacity-100 group-hover/link:translate-y-0 transition duration-500">
                            <span class="font-bold tracking-widest uppercase text-sm">Next Service</span>
                            <svg class="w-6 h-6 animate-pulse" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- CUSTOM CSS --}}
    <style>
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        /* Enhanced Typography for TinyMCE Content */
        .prose {
            color: #cbd5e1;
        }

        .prose h1 {
            font-size: 2.5rem;
            font-weight: 900;
            margin-top: 2rem;
            margin-bottom: 1.5rem;
            color: #ffffff;
            line-height: 1.2;
        }

        .prose h2 {
            font-size: 2rem;
            font-weight: 800;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #f1f5f9;
            line-height: 1.3;
        }

        .prose h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            color: #06b6d4;
            line-height: 1.4;
        }

        .prose h4 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-top: 1.25rem;
            margin-bottom: 0.5rem;
            color: #22d3ee;
        }

        .prose p {
            margin-top: 1.25rem;
            margin-bottom: 1.25rem;
            line-height: 1.8;
            color: #cbd5e1;
        }

        .prose strong {
            color: #ffffff;
            font-weight: 700;
        }

        .prose em {
            color: #e2e8f0;
            font-style: italic;
        }

        .prose ul {
            list-style-type: disc;
            margin-top: 1.25rem;
            margin-bottom: 1.25rem;
            padding-left: 1.5rem;
        }

        .prose ol {
            list-style-type: decimal;
            margin-top: 1.25rem;
            margin-bottom: 1.25rem;
            padding-left: 1.5rem;
        }

        .prose li {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
            line-height: 1.75;
            color: #cbd5e1;
        }

        .prose li::marker {
            color: #06b6d4;
        }

        .prose a {
            color: #06b6d4;
            text-decoration: underline;
            text-decoration-color: rgba(6, 182, 212, 0.3);
            transition: all 0.3s;
        }

        .prose a:hover {
            color: #22d3ee;
            text-decoration-color: #22d3ee;
        }

        .prose blockquote {
            border-left: 4px solid #06b6d4;
            padding-left: 1.5rem;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            margin: 1.5rem 0;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 0 0.75rem 0.75rem 0;
            font-style: italic;
            color: #94a3b8;
        }

        .prose code {
            background: #1e293b;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
            font-size: 0.875em;
            color: #22d3ee;
            font-family: 'Courier New', monospace;
        }

        .prose pre {
            background: #0F1623 !important;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin: 1.5rem 0;
            overflow-x: auto;
        }

        .prose pre code {
            background: transparent;
            padding: 0;
            color: #e2e8f0;
        }

        .prose img {
            border-radius: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin: 2rem 0;
            width: 100%;
            height: auto;
        }

        .prose table {
            width: 100%;
            border-collapse: collapse;
            margin: 2rem 0;
            background: rgba(255, 255, 255, 0.02);
            border-radius: 0.75rem;
            overflow: hidden;
        }

        .prose thead {
            background: rgba(6, 182, 212, 0.1);
        }

        .prose th {
            padding: 1rem;
            text-align: left;
            font-weight: 700;
            color: #06b6d4;
            border-bottom: 2px solid rgba(6, 182, 212, 0.3);
        }

        .prose td {
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            color: #cbd5e1;
        }

        .prose tbody tr:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .prose hr {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin: 3rem 0;
        }

        /* Text alignment classes from TinyMCE */
        .prose [style*="text-align: center"],
        .prose .align-center {
            text-align: center;
        }

        .prose [style*="text-align: right"],
        .prose .align-right {
            text-align: right;
        }

        .prose [style*="text-align: justify"],
        .prose .align-justify {
            text-align: justify;
        }

        /* Color support from TinyMCE */
        .prose [style*="color"] {
            /* Preserve inline color styles from TinyMCE */
        }

        .prose [style*="background-color"] {
            padding: 0.125rem 0.375rem;
            border-radius: 0.25rem;
        }

        /* Hide scrollbar for clean look */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</div>
