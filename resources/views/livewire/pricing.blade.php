<div class="bg-[#0B0F19] text-white min-h-screen selection:bg-cyan-500 selection:text-white pt-32 pb-20"
     x-data="{ activeTab: '{{ $categories->first()?->slug ?? 'website' }}' }">

    {{-- Header --}}
    <div class="container mx-auto px-6 text-center mb-12">
        <span class="text-cyan-400 font-bold tracking-widest uppercase text-sm mb-4 block"
            data-aos="fade-down">Investment</span>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6" data-aos="zoom-in">
            TRANSPARENT <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-600">PRICING.</span>
        </h1>
        <p class="text-slate-400 max-w-2xl mx-auto text-lg" data-aos="fade-up">
            Pilih paket layanan yang sesuai dengan kebutuhan Anda. Transparan tanpa biaya tersembunyi.
        </p>
    </div>

    {{-- Segmented Tab Switcher --}}
    <div class="flex justify-center mb-16" data-aos="fade-up">
        <div class="bg-[#0D1420] border border-cyan-500/20 p-1.5 rounded-2xl flex flex-wrap gap-2 justify-center max-w-3xl">
            @foreach ($categories as $cat)
                @php
                    $emoji = $cat->slug === 'website' ? '🌐 ' : ($cat->slug === 'jasa' ? '🛠️ ' : '💎 ');
                    $btnClass = $cat->slug === 'website' 
                        ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-white shadow-[0_0_15px_rgba(6,182,212,0.3)]' 
                        : 'bg-gradient-to-r from-purple-500 to-pink-600 text-white shadow-[0_0_15px_rgba(147,51,234,0.3)]';
                @endphp
                <button @click="activeTab = '{{ $cat->slug }}'"
                    :class="activeTab === '{{ $cat->slug }}' ? '{{ $btnClass }}' : 'text-slate-400 hover:text-white'"
                    class="px-6 py-3 rounded-xl font-bold uppercase tracking-wider text-xs transition duration-300">
                    {{ $emoji }}{{ $cat->name }}
                </button>
            @endforeach
        </div>
    </div>

    {{-- Pricing Grid --}}
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">

            @foreach ($packages as $index => $pkg)
                <div x-show="activeTab === '{{ $pkg->category ?? 'website' }}'"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    class="relative group rounded-3xl p-8 border transition duration-500 flex flex-col justify-between
                    {{ $pkg->is_popular ? 'bg-white/5 border-cyan-500 shadow-[0_0_50px_rgba(6,182,212,0.15)] scale-105 z-10' : 'bg-[#0F1623] border-white/10 hover:border-white/20' }}"
                    data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    
                    <div>
                        {{-- Popular Badge --}}
                        @if ($pkg->is_popular)
                            <div
                                class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gradient-to-r {{ $pkg->category === 'jasa' ? 'from-purple-500 to-pink-500' : 'from-cyan-500 to-blue-500' }} text-white text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full shadow-lg">
                                Most Popular
                            </div>
                        @endif

                        <h3 class="text-xl font-bold text-white mb-2">{{ $pkg->name }}</h3>
                        
                        <div class="flex items-baseline gap-1 mb-2">
                            <span class="text-sm text-slate-400">Rp</span>
                            <span
                                class="text-4xl font-black text-white">{{ number_format($pkg->price, 0, ',', '.') }}</span>
                        </div>
                        <p class="text-slate-500 text-xs font-mono uppercase mb-6 tracking-widest">{{ $pkg->period }}</p>
                        
                        @if($pkg->description)
                            <p class="text-slate-400 text-sm mb-6 pb-6 border-b border-white/10 leading-relaxed">
                                {{ $pkg->description }}
                            </p>
                        @else
                            <div class="border-b border-white/10 mb-6"></div>
                        @endif

                        {{-- Features --}}
                        <ul class="space-y-4 mb-10">
                            @foreach ($pkg->features as $feature)
                                <li class="flex items-start gap-3 text-slate-300 text-sm">
                                    <svg class="w-5 h-5 {{ $pkg->category === 'jasa' ? 'text-purple-400' : 'text-cyan-400' }} shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- CTA Button --}}
                    <div>
                        <a href="{{ $pkg->cta_link }}" target="_blank"
                            class="block w-full py-4 rounded-xl font-bold text-center transition duration-300
                            {{ $pkg->is_popular 
                                ? ($pkg->category === 'jasa' ? 'bg-gradient-to-r from-purple-500 to-pink-600 text-white shadow-[0_0_20px_rgba(147,51,234,0.4)] hover:opacity-90' : 'bg-cyan-500 hover:bg-cyan-400 text-black shadow-[0_0_20px_rgba(6,182,212,0.4)]') 
                                : 'bg-white/10 hover:bg-white/20 text-white' }}">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
