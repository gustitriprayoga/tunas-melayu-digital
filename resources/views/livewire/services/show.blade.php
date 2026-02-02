<div class="bg-[#0B0F19] text-white selection:bg-cyan-500 selection:text-white overflow-x-hidden">

    {{-- ========================================== --}}
    {{-- 1. HERO HEADER (IMMERSIVE GLOW) --}}
    {{-- ========================================== --}}
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
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <span class="text-cyan-500">/</span>
                <a href="{{ route('services.index') }}" class="hover:text-white transition">Services</a>
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

            <h1 data-aos="fade-up" class="text-5xl md:text-7xl font-black tracking-tight mb-4">
                {{ $service->title }}
            </h1>

            <p data-aos="fade-up" data-aos-delay="100" class="text-xl text-slate-400 max-w-2xl mx-auto">
                {{ $service->short_description }}
            </p>
        </div>
    </section>


    {{-- ========================================== --}}
    {{-- 2. MAIN CONTENT GRID (LEFT CONTENT, RIGHT STICKY) --}}
    {{-- ========================================== --}}
    <section class="relative py-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

                {{-- KOLOM KIRI: KONTEN UTAMA (8 Kolom) --}}
                <div class="lg:col-span-8">
                    <div class="rounded-3xl overflow-hidden mb-12 border border-white/10 shadow-2xl relative group"
                        data-aos="fade-up">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0B0F19] to-transparent opacity-60"></div>
                        <div
                            class="w-full h-80 bg-gradient-to-br from-slate-800 to-slate-900 flex items-center justify-center group-hover:scale-105 transition duration-700">
                            <h2 class="text-4xl font-bold text-white/5 uppercase tracking-widest select-none">Overview
                            </h2>
                        </div>
                    </div>

                    <div class="prose prose-lg prose-invert prose-cyan max-w-none prose-headings:font-bold prose-headings:tracking-tight prose-p:text-slate-300 prose-a:text-cyan-400 hover:prose-a:text-cyan-300 prose-blockquote:border-l-cyan-500 prose-blockquote:bg-white/5 prose-blockquote:py-2 prose-blockquote:pr-4 prose-li:marker:text-cyan-500"
                        data-aos="fade-up">

                        {{-- Render HTML dari Editor --}}
                        {!! $service->full_content !!}

                        {{-- Dummy Content Jika full_content kosong (Hapus bagian ini nanti) --}}
                        @if (!$service->full_content)
                            <h3>Mengapa Memilih Layanan Ini?</h3>
                            <p>Di era digital yang serba cepat, performa dan skalabilitas adalah kunci. Layanan
                                <strong>{{ $service->title }}</strong> kami dirancang khusus untuk memenuhi kebutuhan
                                tersebut dengan pendekatan teknologi terbaru.</p>

                            <blockquote>
                                "Kami percaya bahwa kode yang baik adalah kode yang tidak hanya bekerja, tetapi juga
                                mudah dirawat dan dikembangkan."
                            </blockquote>

                            <h3>Pendekatan Teknis Kami</h3>
                            <ul>
                                <li><strong>Analisis Mendalam:</strong> Memahami model bisnis Anda sebelum menulis satu
                                    baris kode pun.</li>
                                <li><strong>Arsitektur Modern:</strong> Menggunakan Microservices atau Monolith Modular
                                    sesuai skala proyek.</li>
                                <li><strong>Keamanan First:</strong> Implementasi standar keamanan OWASP sejak hari
                                    pertama.</li>
                            </ul>

                            <p>Hubungi kami hari ini untuk konsultasi gratis mengenai bagaimana {{ $service->title }}
                                dapat mentransformasi bisnis Anda.</p>
                        @endif
                    </div>

                    <div class="mt-16 pt-16 border-t border-white/10" x-data="{ active: null }">
                        <h3 class="text-2xl font-bold mb-8">Pertanyaan Umum (FAQ)</h3>

                        <div class="space-y-4">
                            <div class="border border-white/10 rounded-xl bg-white/5 overflow-hidden">
                                <button @click="active = (active === 1 ? null : 1)"
                                    class="flex items-center justify-between w-full p-6 text-left hover:bg-white/5 transition">
                                    <span class="font-bold text-slate-200">Berapa lama estimasi pengerjaan?</span>
                                    <svg class="w-5 h-5 transform transition-transform duration-300"
                                        :class="active === 1 ? 'rotate-180 text-cyan-400' : 'text-slate-500'"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="active === 1" x-collapse class="p-6 pt-0 text-slate-400">
                                    Waktu pengerjaan bervariasi tergantung kompleksitas fitur. Untuk MVP (Minimum Viable
                                    Product), biasanya memakan waktu 4-8 minggu.
                                </div>
                            </div>

                            <div class="border border-white/10 rounded-xl bg-white/5 overflow-hidden">
                                <button @click="active = (active === 2 ? null : 2)"
                                    class="flex items-center justify-between w-full p-6 text-left hover:bg-white/5 transition">
                                    <span class="font-bold text-slate-200">Teknologi apa yang digunakan?</span>
                                    <svg class="w-5 h-5 transform transition-transform duration-300"
                                        :class="active === 2 ? 'rotate-180 text-cyan-400' : 'text-slate-500'"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div x-show="active === 2" x-collapse class="p-6 pt-0 text-slate-400">
                                    Kami menggunakan stack modern seperti Laravel, React/Vue, Tailwind CSS, dan Cloud
                                    Infrastructure (AWS/DigitalOcean) untuk menjamin performa terbaik.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- KOLOM KANAN: STICKY SIDEBAR (4 Kolom) --}}
                <div class="lg:col-span-4 relative">
                    <div class="sticky top-28 space-y-8">

                        <div class="relative p-[1px] rounded-3xl bg-gradient-to-b from-cyan-500/50 to-purple-600/50 group"
                            data-aos="fade-left">
                            <div
                                class="absolute inset-0 bg-gradient-to-b from-cyan-500 to-purple-600 blur-lg opacity-20 group-hover:opacity-40 transition duration-500">
                            </div>
                            <div class="relative rounded-[23px] bg-[#0F1623] p-8 text-center h-full">
                                <h3 class="text-2xl font-bold text-white mb-2">Tertarik dengan Layanan Ini?</h3>
                                <p class="text-slate-400 text-sm mb-6">Diskusikan kebutuhan Anda dengan tim ahli kami.
                                </p>

                                <a href="{{ route('contact') }}"
                                    class="block w-full py-4 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-xl transition shadow-[0_0_20px_rgba(8,145,178,0.4)] mb-4">
                                    Mulai Konsultasi
                                </a>

                                <div class="flex items-center justify-center gap-2 text-xs text-slate-500">
                                    <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Respon dalam 24 Jam</span>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-3xl border border-white/10 bg-white/5 p-6 backdrop-blur-sm"
                            data-aos="fade-left" data-aos-delay="100">
                            <h4 class="text-sm font-bold uppercase tracking-widest text-slate-500 mb-4">Supported Tech
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                <span
                                    class="px-3 py-1 bg-slate-800 rounded-lg text-xs font-mono text-cyan-400 border border-cyan-500/20">Laravel</span>
                                <span
                                    class="px-3 py-1 bg-slate-800 rounded-lg text-xs font-mono text-blue-400 border border-blue-500/20">React</span>
                                <span
                                    class="px-3 py-1 bg-slate-800 rounded-lg text-xs font-mono text-purple-400 border border-purple-500/20">AWS</span>
                                <span
                                    class="px-3 py-1 bg-slate-800 rounded-lg text-xs font-mono text-white border border-white/10">Docker</span>
                            </div>
                        </div>

                        <div class="p-6" data-aos="fade-left" data-aos-delay="200">
                            <h4 class="text-sm font-bold uppercase tracking-widest text-slate-500 mb-4">Butuh Bantuan
                                Cepat?</h4>
                            <a href="https://wa.me/6281234567890" target="_blank"
                                class="flex items-center gap-3 text-white hover:text-green-400 transition group">
                                <div
                                    class="w-10 h-10 rounded-full bg-green-500/10 flex items-center justify-center group-hover:bg-green-500/20">
                                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487 2.082.899 2.503.719 2.949.679.446-.04 1.437-.586 1.64-1.15.203-.566.203-1.052.142-1.15z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block font-bold">WhatsApp</span>
                                    <span class="text-xs text-slate-500">+62 812-3456-7890</span>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ========================================== --}}
    {{-- 3. NEXT PROJECT NAVIGATION --}}
    {{-- ========================================== --}}
    @if ($nextService)
        <section class="py-20 border-t border-white/5 bg-[#0F1623]">
            <div class="container mx-auto px-6">
                <div class="flex flex-col items-center text-center">
                    <span class="text-slate-500 uppercase tracking-widest text-xs font-bold mb-4">Explore Next</span>

                    <a href="{{ route('services.show', $nextService->slug) }}" wire:navigate class="group">
                        <h2
                            class="text-4xl md:text-6xl font-black text-white group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-cyan-400 group-hover:to-purple-600 transition-all duration-300">
                            {{ $nextService->title }}
                        </h2>
                        <div
                            class="mt-4 flex justify-center items-center gap-2 text-cyan-400 opacity-0 transform translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition duration-500">
                            <span>Lihat Layanan</span>
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    @endif

    <style>
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Custom Prose for Dark Mode */
        .prose-invert blockquote {
            font-style: italic;
            font-weight: 500;
        }
    </style>
</div>
