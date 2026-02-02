<div x-data="audioPlayer()" x-init="initPlayer()" wire:ignore {{-- Agar Livewire tidak mereset player saat navigasi --}}
    class="fixed bottom-6 left-6 z-50 flex flex-col items-start gap-2">
    {{-- Audio Element (Hidden) --}}
    @if ($music)
        <audio x-ref="audioElement" loop>
            @php
                // Logika Cerdas:
                // Jika link dimulai dengan 'http', anggap itu link luar (Direct URL)
                // Jika tidak, anggap itu file yang diupload ke Storage/Public
                $src = \Illuminate\Support\Str::startsWith($music->file_url, ['http', 'https'])
                    ? $music->file_url
                    : asset($music->file_url); // atau Storage::url($music->file_url) jika pakai Filament Upload
            @endphp

            <source src="{{ $src }}" type="audio/mpeg">
        </audio>
    @endif

    {{-- THE PLAYER WIDGET --}}
    <div class="relative group">

        <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500 to-purple-600 rounded-full blur opacity-25 group-hover:opacity-75 transition duration-500"
            :class="{ 'opacity-75': isPlaying }"></div>

        <div class="relative bg-[#0F1623]/90 backdrop-blur-xl border border-white/10 rounded-full p-2 pr-6 flex items-center gap-4 shadow-2xl transition-all duration-300 overflow-hidden"
            :class="isExpanded ? 'w-auto' : 'w-14 h-14 pr-2'">

            <button @click="togglePlay"
                class="relative w-10 h-10 flex items-center justify-center rounded-full bg-slate-800 border border-white/10 text-cyan-400 hover:text-white hover:bg-cyan-500 transition-all duration-300 shrink-0 z-20">
                <svg x-show="!isPlaying" class="w-4 h-4 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z" />
                </svg>

                <svg x-show="isPlaying" x-cloak class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z" />
                </svg>

                <div x-show="isPlaying"
                    class="absolute inset-0 rounded-full border-2 border-dashed border-cyan-400 animate-spin-slow pointer-events-none">
                </div>
            </button>


            <div x-show="isExpanded || isPlaying" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-x-[-10px] w-0"
                x-transition:enter-end="opacity-100 translate-x-0 w-auto"
                class="flex flex-col justify-center min-w-[120px]" x-cloak>
                @if ($music)
                    <div class="w-32 overflow-hidden whitespace-nowrap">
                        <div class="text-xs font-bold text-white" :class="{ 'animate-marquee-text': isPlaying }">
                            {{ $music->title }} - {{ $music->artist }}
                        </div>
                    </div>

                    <div class="flex items-end gap-[2px] h-3 mt-1">
                        <template x-for="i in 8">
                            <div class="w-1 bg-gradient-to-t from-purple-500 to-cyan-400 rounded-t-sm"
                                :class="isPlaying ? 'animate-music-bar' : 'h-[2px]'"
                                :style="`animation-duration: ${Math.random() * 0.5 + 0.5}s; animation-delay: ${i * 0.1}s`">
                            </div>
                        </template>
                    </div>
                @else
                    <span class="text-xs text-red-400">No Music</span>
                @endif
            </div>

            <button @click="isExpanded = !isExpanded" class="ml-2 text-slate-500 hover:text-white" x-show="isPlaying">
                <svg class="w-4 h-4 transform transition-transform" :class="isExpanded ? 'rotate-180' : ''"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

        </div>
    </div>

    <div x-show="!isPlaying && !isExpanded" x-transition
        class="absolute left-16 top-3 px-3 py-1 bg-white text-black text-xs font-bold rounded-md whitespace-nowrap pointer-events-none">
        Play Music
        <div class="absolute left-[-4px] top-1/2 -translate-y-1/2 w-2 h-2 bg-white transform rotate-45"></div>
    </div>

    <script>
        function audioPlayer() {
            return {
                isPlaying: true,
                isExpanded: true,
                hasInteracted: false,

                initPlayer() {
                    const audio = this.$refs.audioElement;

                    // Cek jika browser memblokir autoplay (wajib ada interaksi user dulu)
                    audio.volume = 0.5; // Set volume 50%

                    // Jika user pindah halaman, status play tetap terjaga (Opsional: localStorage)
                    const savedState = localStorage.getItem('musicPlaying');
                    if (savedState === 'true') {
                        // Browser modern memblokir auto-play tanpa interaksi.
                        // Kita coba play, jika gagal kita set ke pause.
                        audio.play().then(() => {
                            this.isPlaying = true;
                        }).catch(() => {
                            this.isPlaying = false;
                        });
                    }

                    // Event listener saat lagu selesai
                    audio.addEventListener('ended', () => {
                        this.isPlaying = false;
                    });
                },

                togglePlay() {
                    const audio = this.$refs.audioElement;
                    if (this.isPlaying) {
                        audio.pause();
                        this.isPlaying = false;
                        localStorage.setItem('musicPlaying', 'false');
                    } else {
                        audio.play();
                        this.isPlaying = true;
                        this.isExpanded = true; // Buka player saat play
                        localStorage.setItem('musicPlaying', 'true');
                    }
                }
            }
        }
    </script>

    <style>
        .animate-spin-slow {
            animation: spin 3s linear infinite;
        }

        @keyframes music-bar {

            0%,
            100% {
                height: 20%;
            }

            50% {
                height: 100%;
            }
        }

        .animate-music-bar {
            animation: music-bar 0.5s ease-in-out infinite;
        }

        @keyframes marquee-text {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .animate-marquee-text {
            display: inline-block;
            animation: marquee-text 5s linear infinite;
        }

        /* Hide Alpine elements before load */
        [x-cloak] {
            display: none !important;
        }
    </style>
</div>
