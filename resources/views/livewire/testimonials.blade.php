<div class="bg-[#0B0F19] text-white min-h-screen selection:bg-cyan-500 selection:text-white relative overflow-x-hidden">

    {{-- BACKGROUND ATMOSPHERE --}}
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-0 left-1/4 w-[800px] h-[800px] bg-cyan-900/10 rounded-full blur-[150px] animate-pulse">
        </div>
        <div class="absolute bottom-0 right-1/4 w-[800px] h-[800px] bg-purple-900/10 rounded-full blur-[150px]"></div>
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
    </div>

    {{-- HEADER SECTION --}}
    <section class="relative pt-40 pb-20 text-center z-10">
        <div class="container mx-auto px-6">
            <span data-aos="fade-down" class="text-cyan-400 font-mono text-xs uppercase tracking-[0.3em] mb-4 block">
                Social Proof
            </span>
            <h1 data-aos="zoom-in" class="text-6xl md:text-8xl font-black tracking-tighter mb-8 leading-tight">
                WALL OF <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-purple-500">TRUST.</span>
            </h1>
            <p data-aos="fade-up" data-aos-delay="200" class="text-xl text-slate-400 max-w-2xl mx-auto">
                Jangan hanya percaya kata-kata kami. Lihat apa yang dikatakan para visioner tentang kolaborasi gila ini.
            </p>

            {{-- Summary Stats --}}
            <div class="flex justify-center gap-8 mt-12" data-aos="fade-up" data-aos-delay="400">
                <div class="text-center px-6 py-4 bg-white/5 rounded-2xl border border-white/10 backdrop-blur-md">
                    <span class="block text-3xl font-black text-white">5.0</span>
                    <div class="flex gap-1 justify-center my-1">
                        @foreach (range(1, 5) as $i)
                            <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endforeach
                    </div>
                    <span class="text-xs text-slate-400 uppercase tracking-widest">Average Rating</span>
                </div>
                <div class="text-center px-6 py-4 bg-white/5 rounded-2xl border border-white/10 backdrop-blur-md">
                    <span class="block text-3xl font-black text-white">100+</span>
                    <span class="block text-xs text-slate-400 uppercase tracking-widest mt-2">Happy Clients</span>
                </div>
            </div>
        </div>
    </section>

    {{-- MASONRY GRID TESTIMONIALS --}}
    <section class="pb-32 relative z-10 px-4">
        <div class="container mx-auto">
            <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8">

                @foreach ($testimonials as $index => $testi)
                    <div class="break-inside-avoid relative group perspective-card" data-aos="fade-up"
                        data-aos-delay="{{ ($index % 3) * 100 }}" x-data="{
                            rotateX: 0,
                            rotateY: 0,
                            handleMouseMove(e) {
                                const rect = this.$el.getBoundingClientRect();
                                const x = e.clientX - rect.left;
                                const y = e.clientY - rect.top;
                                const centerX = rect.width / 2;
                                const centerY = rect.height / 2;
                                this.rotateX = ((y - centerY) / 20) * -1; // Reverse logic for natural tilt
                                this.rotateY = (x - centerX) / 20;
                            },
                            reset() {
                                this.rotateX = 0;
                                this.rotateY = 0;
                            }
                        }" @mousemove="handleMouseMove"
                        @mouseleave="reset" @mouseenter="$store.sfx.playHover()" {{-- Sound Effect --}}>

                        <div class="relative bg-[#0F1623] border border-white/10 p-8 rounded-3xl transition-all duration-200 ease-out hover:border-cyan-500/50 hover:shadow-[0_0_50px_rgba(6,182,212,0.15)]"
                            :style="`transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg);`">
                            <div
                                class="absolute top-6 right-6 text-white/5 group-hover:text-cyan-500/20 transition duration-500">
                                <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V11C14.017 11.5523 13.5693 12 13.017 12H12.017V5H22.017V15C22.017 18.3137 19.3307 21 16.017 21H14.017ZM5.0166 21L5.0166 18C5.0166 16.8954 5.91203 16 7.0166 16H10.0166C10.5689 16 11.0166 15.5523 11.0166 15V9C11.0166 8.44772 10.5689 8 10.0166 8H6.0166C5.46432 8 5.0166 8.44772 5.0166 9V11C5.0166 11.5523 4.56889 12 4.0166 12H3.0166V5H13.0166V15C13.0166 18.3137 10.3303 21 7.0166 21H5.0166Z" />
                                </svg>
                            </div>

                            <div class="flex items-center gap-4 mb-6 relative z-10">
                                <div
                                    class="w-14 h-14 rounded-full p-[2px] bg-gradient-to-tr from-cyan-500 to-purple-500">
                                    <div class="w-full h-full rounded-full overflow-hidden border-2 border-[#0F1623]">
                                        @if ($testi->getFirstMediaUrl('avatar'))
                                            <img src="{{ $testi->getFirstMediaUrl('avatar') }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <div
                                                class="w-full h-full bg-slate-800 flex items-center justify-center text-xs">
                                                IMG</div>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <h3 class="font-bold text-white text-lg leading-tight">{{ $testi->name }}</h3>
                                    <p class="text-xs text-cyan-400 font-mono uppercase tracking-wider">
                                        {{ $testi->position }}</p>
                                </div>
                            </div>

                            <div class="flex gap-1 mb-4">
                                @foreach (range(1, $testi->rating) as $i)
                                    <svg class="w-4 h-4 text-yellow-500 drop-shadow-[0_0_5px_rgba(234,179,8,0.5)]"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endforeach
                            </div>

                            <p class="text-slate-300 leading-relaxed relative z-10">
                                "{{ $testi->content }}"
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- CTA / SUBMIT REVIEW --}}
    <section class="py-24 relative overflow-hidden bg-white/5 border-t border-white/5">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6">Pernah Bekerja Sama dengan Kami?</h2>
            <p class="text-slate-400 mb-8 max-w-xl mx-auto">Bagikan pengalaman "gila" Anda dan bantu orang lain
                menemukan solusi digital terbaik.</p>

            <a href="{{ route('contact') }}"
                class="inline-flex items-center gap-3 px-8 py-4 bg-white text-black font-bold rounded-full hover:bg-cyan-400 transition transform hover:scale-105 shadow-[0_0_20px_rgba(255,255,255,0.3)]">
                <span>Tulis Review</span>
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </a>
        </div>
    </section>
</div>
