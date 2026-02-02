<div class="bg-[#0B0F19] text-white min-h-screen selection:bg-cyan-500 selection:text-white pt-32 pb-20">

    {{-- Header --}}
    <div class="container mx-auto px-6 text-center mb-20">
        <span class="text-cyan-400 font-bold tracking-widest uppercase text-sm mb-4 block"
            data-aos="fade-down">Investment</span>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6" data-aos="zoom-in">
            TRANSPARENT <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-600">PRICING.</span>
        </h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-lg" data-aos="fade-up">
            Pilih paket yang sesuai dengan skala bisnis Anda. Tanpa biaya tersembunyi.
        </p>
    </div>

    {{-- Pricing Grid --}}
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">

            @foreach ($packages as $index => $pkg)
                <div class="relative group rounded-3xl p-8 border transition duration-500
                    {{ $pkg->is_popular ? 'bg-white/5 border-cyan-500 shadow-[0_0_50px_rgba(6,182,212,0.15)] scale-105 z-10' : 'bg-[#0F1623] border-white/10 hover:border-white/20' }}"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    {{-- Popular Badge --}}
                    @if ($pkg->is_popular)
                        <div
                            class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r from-cyan-500 to-blue-500 text-white text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full shadow-lg">
                            Most Popular
                        </div>
                    @endif

                    <h3 class="text-xl font-bold text-white mb-2">{{ $pkg->name }}</h3>
                    <div class="flex items-baseline gap-1 mb-6">
                        <span class="text-sm text-slate-400">Rp</span>
                        <span
                            class="text-4xl font-black text-white">{{ number_format($pkg->price, 0, ',', '.') }}</span>
                    </div>
                    <p class="text-slate-500 text-sm mb-8 border-b border-white/10 pb-8">{{ $pkg->period }}</p>

                    {{-- Features --}}
                    <ul class="space-y-4 mb-10">
                        @foreach ($pkg->features as $feature)
                            <li class="flex items-start gap-3 text-slate-300 text-sm">
                                <svg class="w-5 h-5 text-cyan-400 shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>

                    {{-- CTA Button --}}
                    <a href="{{ $pkg->cta_link }}" target="_blank"
                        class="block w-full py-4 rounded-xl font-bold text-center transition duration-300
                        {{ $pkg->is_popular ? 'bg-cyan-500 hover:bg-cyan-400 text-black shadow-[0_0_20px_rgba(6,182,212,0.4)]' : 'bg-white/10 hover:bg-white/20 text-white' }}">
                        Pilih Paket
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</div>
