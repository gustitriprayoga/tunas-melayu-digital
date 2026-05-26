<div class="bg-[#0B0F19] text-white selection:bg-cyan-500 selection:text-white min-h-screen relative overflow-hidden">

    {{-- BACKGROUND EFFECTS --}}
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div
            class="absolute top-[-10%] right-[-10%] w-[600px] h-[600px] bg-purple-900/20 rounded-full blur-[120px] animate-pulse">
        </div>
        <div
            class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-cyan-900/20 rounded-full blur-[120px] animate-float">
        </div>
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
    </div>

    <div class="container mx-auto px-6 pt-32 pb-20 relative z-10">

        {{-- HEADER --}}
        <div class="text-center mb-20" data-aos="fade-down">
            <span class="text-cyan-400 font-mono text-xs uppercase tracking-[0.3em] mb-4 block">Communication Link</span>
            <h1 class="text-5xl md:text-7xl font-black mb-6">GET IN <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-500">TOUCH</span></h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-lg">
                Siap memulai proyek besar berikutnya? Atau sekadar ingin menyapa? <br>
                Saluran komunikasi kami terbuka 24/7.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

            {{-- KOLOM KIRI: INFO & DISCORD WIDGET --}}
            <div class="space-y-8">

                {{-- 1. DISCORD LIVE STATUS WIDGET --}}
                <div x-data="{
                    discordId: '947807335055786024',
                    status: 'loading',
                    username: 'Loading...',
                    avatar: '',
                    activity: '',
                    color: 'gray'
                }" x-init="fetch('https://api.lanyard.rest/v1/users/' + discordId)
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            const d = data.data;
                            username = d.discord_user.username;
                            avatar = `https://cdn.discordapp.com/avatars/${d.discord_user.id}/${d.discord_user.avatar}.png`;
                            status = d.discord_status; // online, idle, dnd, offline
                
                            // Set Warna Status
                            if (status === 'online') color = 'green';
                            else if (status === 'idle') color = 'yellow';
                            else if (status === 'dnd') color = 'red';
                            else color = 'gray';
                
                            // Cek Activity (VS Code, Game, etc)
                            if (d.activities.length > 0) {
                                activity = 'Playing ' + d.activities[0].name;
                            } else {
                                activity = 'No Activity';
                            }
                        }
                    })"
                    class="relative group rounded-3xl bg-[#5865F2] p-1 overflow-hidden" data-aos="fade-right">
                    <div
                        class="absolute inset-0 bg-[url('https://assets-global.website-files.com/6257adef93867e56f84d3101/636e0a6a49cf127bf92de1e2_icon_clyde_blurple_RGB.png')] bg-cover opacity-10 bg-center">
                    </div>

                    <div
                        class="relative bg-[#0F1623] rounded-[20px] p-6 flex items-center gap-6 h-full border border-white/5 group-hover:bg-[#0F1623]/90 transition">
                        <div class="relative">
                            <img :src="avatar || 'https://cdn.discordapp.com/embed/avatars/0.png'"
                                class="w-20 h-20 rounded-full border-4 border-[#0F1623]">
                            <div class="absolute bottom-1 right-1 w-5 h-5 rounded-full border-4 border-[#0F1623]"
                                :class="{
                                    'bg-green-500': color === 'green',
                                    'bg-yellow-500': color === 'yellow',
                                    'bg-red-500': color === 'red',
                                    'bg-gray-500': color === 'gray'
                                }">
                            </div>
                        </div>

                        <div>
                            <p class="text-xs font-bold text-[#5865F2] uppercase tracking-widest mb-1">Live Status</p>
                            <h3 class="text-2xl font-bold text-white" x-text="username"></h3>
                            <p class="text-slate-400 text-sm flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full animate-pulse"
                                    :class="{
                                        'bg-green-500': color === 'green',
                                        'bg-yellow-500': color === 'yellow',
                                        'bg-red-500': color === 'red',
                                        'bg-gray-500': color === 'gray'
                                    }"></span>
                                <span x-text="activity"></span>
                            </p>
                        </div>

                        <div class="ml-auto opacity-20">
                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.086 2.157 2.419 0 1.334-.956 2.42-2.157 2.42zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.086 2.157 2.419 0 1.334-.946 2.42-2.157 2.42z" />
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- 2. CONTACT INFO CARDS --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white/5 border border-white/10 p-6 rounded-2xl hover:bg-white/10 transition"
                        data-aos="fade-up" data-aos-delay="100">
                        <div
                            class="w-10 h-10 bg-cyan-500/20 rounded-lg flex items-center justify-center text-cyan-400 mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <p class="text-xs text-slate-500 uppercase tracking-widest mb-1">Email Us</p>
                        <p class="text-white font-bold">{{ $settings->support_email ?? 'hello@tunasmelayu.com' }}</p>
                    </div>

                    <div class="bg-white/5 border border-white/10 p-6 rounded-2xl hover:bg-white/10 transition"
                        data-aos="fade-up" data-aos-delay="200">
                        <div
                            class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center text-green-400 mb-4">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <p class="text-xs text-slate-500 uppercase tracking-widest mb-1">Whatsapp</p>
                        <p class="text-white font-bold">{{ $settings->whatsapp_number ?? '+62 812-XXXX-XXXX' }}</p>
                    </div>
                </div>

                {{-- 3. SOCIAL GRID (FROM DATABASE) --}}
                <div class="pt-8 border-t border-white/10">
                    <p class="text-slate-500 text-sm mb-4">Connect with us:</p>
                    <div class="flex flex-wrap gap-4">
                        @foreach ($socials as $social)
                            <a href="{{ $social->url }}" target="_blank"
                                class="flex items-center gap-3 px-5 py-3 rounded-full bg-white/5 border border-white/10 hover:bg-white/10 transition group">
                                <span class="group-hover:text-[{{ $social->color }}] transition-colors duration-300">
                                    {{-- Render Dynamic Icon if possible, or fallback --}}
                                    @svg($social->icon, 'w-5 h-5')
                                </span>
                                <span class="font-bold text-sm">{{ $social->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>


            {{-- KOLOM KANAN: CONTACT FORM (GLASS) --}}
            <div class="relative" data-aos="fade-left">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-3xl blur-2xl opacity-20">
                </div>

                <div
                    class="relative bg-[#0F1623]/80 backdrop-blur-xl border border-white/10 p-8 md:p-10 rounded-3xl shadow-2xl">
                    <h2 class="text-3xl font-black text-white mb-2">Kirim Pesan</h2>
                    <p class="text-slate-400 mb-8">Beritahu kami kebutuhan proyek Anda.</p>

                    @if ($success)
                        <div
                            class="mb-6 p-4 bg-green-500/20 border border-green-500/50 text-green-400 rounded-xl flex items-center gap-3 animate-pulse">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Pesan terkirim! Kami akan segera menghubungi Anda.
                        </div>
                    @endif

                    <form wire:submit="sendMessage" class="space-y-6">
                        <div class="group">
                            <label
                                class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2 group-focus-within:text-cyan-400 transition">Nama
                                Lengkap</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" wire:model="name"
                                    class="w-full bg-slate-900 border border-slate-700 rounded-xl py-4 pl-12 pr-4 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition"
                                    placeholder="John Doe">
                            </div>
                            @error('name')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="group">
                            <label
                                class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2 group-focus-within:text-cyan-400 transition">Alamat
                                Email</label>
                            <div class="relative">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input type="email" wire:model="email"
                                    class="w-full bg-slate-900 border border-slate-700 rounded-xl py-4 pl-12 pr-4 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition"
                                    placeholder="john@example.com">
                            </div>
                            @error('email')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="group">
                            <label
                                class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2 group-focus-within:text-cyan-400 transition">Detail
                                Proyek</label>
                            <div class="relative">
                                <textarea wire:model="message" rows="4"
                                    class="w-full bg-slate-900 border border-slate-700 rounded-xl py-4 px-4 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition"
                                    placeholder="Ceritakan ide gila Anda..."></textarea>
                            </div>
                            @error('message')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full bg-white text-black font-bold py-4 rounded-xl hover:bg-cyan-400 hover:text-white transition-all duration-300 transform hover:scale-[1.02] shadow-lg flex justify-center items-center gap-2">
                            <span wire:loading.remove>Kirim Pesan</span>
                            <span wire:loading
                                class="animate-spin rounded-full h-5 w-5 border-b-2 border-black"></span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>


    {{-- ========================================== --}}
    {{-- 4. MAP SECTION (CYBERPUNK STYLE) --}}
    {{-- ========================================== --}}
    <section
        class="h-[400px] w-full relative overflow-hidden grayscale invert brightness-90 contrast-125 border-t border-white/10"
        x-data="{ updated: false }"
        x-on:settings-updated.window="updated = true; setTimeout(() => updated = false, 3000)">
        
        @if(isset($settings->more_configs['google_maps_embed']) && $settings->more_configs['google_maps_embed'])
            {!! $settings->more_configs['google_maps_embed'] !!}
        @else
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127672.27503733076!2d101.37894372986423!3d0.5097486828452367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ac1a9424750f%3A0x3039d80b220cc30!2sPekanbaru%2C%20Pekanbaru%20City%2C%20Riau!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        @endif

        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black/80 backdrop-blur-md p-6 rounded-2xl border border-white/20 text-center shadow-2xl grayscale-0 invert-0 transition-all"
            :class="updated ? 'border-cyan-500 scale-110 shadow-[0_0_30px_rgba(6,182,212,0.3)]' : ''">
            <span class="text-cyan-400 text-xs font-bold uppercase tracking-widest" x-text="updated ? 'LOCATION UPDATED' : 'Headquarters'"></span>
            <h3 class="text-xl font-bold text-white mt-1">{{ $settings->site_name ?? 'Tunas Melayu Digital' }}</h3>
            <p class="text-slate-400 text-sm mt-2">{{ $settings->office_address ?? 'Riau, Indonesia' }}</p>
        </div>
    </section>

    <style>
        .animate-float {
            animation: float 10s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(20px, -20px);
            }

            100% {
                transform: translate(0, 0);
            }
        }
    </style>
</div>
