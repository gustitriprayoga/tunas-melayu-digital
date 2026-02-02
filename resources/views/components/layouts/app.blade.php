<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Tunas Melayu Digital' }}</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-white bg-[#0f172a]">

    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-50">
        <div class="bg-blob bg-cyan-500 w-96 h-96 top-0 -left-20"></div>
        <div class="bg-blob bg-purple-600 w-96 h-96 bottom-0 -right-20 animation-delay-2000"></div>
        <div
            class="bg-blob bg-blue-600 w-64 h-64 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 opacity-20">
        </div>
    </div>

    <livewire:components.navbar />

    {{-- <livewire:components.terminal /> --}}

    <main>
        {{ $slot }}
    </main>

    <livewire:components.footer />

    {{-- >>> PERBAIKAN DI SINI <<< --}}
    {{-- Bungkus player dengan @persist agar tidak ter-reset --}}
    @persist('music-player')
        <livewire:components.audio-player />
    @endpersist

    {{-- Widget WA (Opsional di-persist juga kalau mau state chatnya tersimpan) --}}
    @persist('whatsapp-widget')
        <livewire:components.whatsapp-float />
    @endpersist



    {{-- COMMAND PALETTE (CTRL + K) --}}
    <div x-data="{
        open: false,
        search: '',
        items: [
            { label: 'Home', url: '{{ route('home') }}', icon: '🏠' },
            { label: 'Services', url: '{{ route('services.index') }}', icon: '⚡' },
            { label: 'Portfolio', url: '{{ route('portfolio.index') }}', icon: '💼' },
            { label: 'About Us', url: '{{ route('about') }}', icon: '👽' },
            { label: 'Pricing', url: '{{ route('pricing') }}', icon: '💎' },
            { label: 'Contact', url: '{{ route('contact') }}', icon: '📞' },
            { label: 'Testimonials', url: '{{ route('testimonials') }}', icon: '⭐' },
        ],
        get filteredItems() {
            return this.items.filter(i => i.label.toLowerCase().includes(this.search.toLowerCase()));
        },
        execute(url) {
            this.open = false;
            Livewire.navigate(url); // Gunakan Livewire Navigate
        }
    }" @keydown.window.ctrl.k.prevent="open = !open"
        @keydown.window.meta.k.prevent="open = !open" {{-- Support Mac CMD+K --}} @keydown.escape.window="open = false"
        class="relative z-[9999]" x-cloak>

        <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black/80 backdrop-blur-sm"></div>

        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95 translate-y-10"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-10"
            class="fixed inset-0 z-[10000] flex items-start justify-center pt-[20vh] p-4 pointer-events-none">

            <div class="w-full max-w-2xl bg-[#0F1623] border border-cyan-500/50 rounded-xl shadow-[0_0_50px_rgba(6,182,212,0.3)] overflow-hidden pointer-events-auto"
                @click.away="open = false">

                <div class="flex items-center border-b border-white/10 px-4">
                    <svg class="w-6 h-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" x-model="search" x-ref="searchInput"
                        class="w-full bg-transparent border-none text-white text-lg px-4 py-4 focus:ring-0 placeholder-slate-500"
                        placeholder="Type a command or search...">
                    <span class="text-xs text-slate-500 border border-slate-700 px-2 py-1 rounded">ESC</span>
                </div>

                <div class="max-h-[60vh] overflow-y-auto p-2">
                    <template x-for="item in filteredItems">
                        <button @click="execute(item.url)" @mouseenter="$store.sfx.playHover()"
                            class="w-full flex items-center gap-3 px-4 py-3 text-left text-slate-300 hover:bg-cyan-500/20 hover:text-cyan-400 rounded-lg transition group">
                            <span x-text="item.icon"
                                class="text-xl opacity-70 group-hover:opacity-100 group-hover:scale-110 transition"></span>
                            <span x-text="item.label" class="font-medium"></span>
                            <span class="ml-auto text-xs text-slate-600 group-hover:text-cyan-300">Jump to</span>
                        </button>
                    </template>

                    <div x-show="filteredItems.length === 0" class="p-8 text-center text-slate-500">
                        <p>No results found for "<span x-text="search" class="text-white"></span>"</p>
                    </div>
                </div>

                <div class="bg-black/30 px-4 py-2 text-[10px] text-slate-500 flex justify-between">
                    <span>Use arrows to navigate</span>
                    <span class="text-cyan-500">SYSTEM READY</span>
                </div>
            </div>
        </div>

        <div x-effect="if(open) $nextTick(() => $refs.searchInput.focus())"></div>
    </div>

    {{-- MATRIX RAIN EASTER EGG --}}
    <canvas id="matrixCanvas"
        class="fixed inset-0 z-[99999] pointer-events-none hidden opacity-0 transition-opacity duration-1000 mix-blend-screen"></canvas>

    <script>
        document.addEventListener('alpine:init', () => {
            // KONAMI CODE DETECTOR
            const konamiCode = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight',
                'ArrowLeft', 'ArrowRight', 'b', 'a'
            ];
            let cursor = 0;

            document.addEventListener('keydown', (e) => {
                cursor = (e.key === konamiCode[cursor]) ? cursor + 1 : 0;

                if (cursor === konamiCode.length) {
                    activateMatrix();
                    cursor = 0;
                }
            });

            // MATRIX RAIN LOGIC
            function activateMatrix() {
                const canvas = document.getElementById('matrixCanvas');
                const ctx = canvas.getContext('2d');

                // Show Canvas
                canvas.classList.remove('hidden');
                setTimeout(() => canvas.classList.remove('opacity-0'), 100);

                // Setup
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;

                const katakana =
                    'アァカサタナハマヤャラワガザダバパイィキシチニヒミリヰギジヂビピウゥクスツヌフムユュルグズブヅプエェケセテネヘメレヱゲゼデベペオォコソトノホモヨョロヲゴゾドボポヴッン0123456789Z';
                const latin = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                const nums = '0123456789';
                const alphabet = katakana + latin + nums;
                const fontSize = 16;
                const columns = canvas.width / fontSize;
                const rainDrops = Array.from({
                    length: columns
                }).fill(1);

                const draw = () => {
                    ctx.fillStyle = 'rgba(0, 0, 0, 0.05)';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);

                    ctx.fillStyle = '#0F0'; // Green Matrix
                    ctx.font = fontSize + 'px monospace';

                    for (let i = 0; i < rainDrops.length; i++) {
                        const text = alphabet.charAt(Math.floor(Math.random() * alphabet.length));
                        ctx.fillText(text, i * fontSize, rainDrops[i] * fontSize);

                        if (rainDrops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                            rainDrops[i] = 0;
                        }
                        rainDrops[i]++;
                    }
                };

                const interval = setInterval(draw, 30);

                // Matikan otomatis setelah 10 detik
                setTimeout(() => {
                    canvas.classList.add('opacity-0');
                    setTimeout(() => {
                        clearInterval(interval);
                        canvas.classList.add('hidden');
                    }, 1000);
                }, 10000);
            }
        });
    </script>


    {{-- MODERN CYBERPUNK GLITCH PRELOADER --}}
    <div x-data="{ loaded: false }" x-init="setTimeout(() => { loaded = true }, 3000)" {{-- Durasi 3 detik --}} x-show="!loaded" {{-- Transisi Keluar yang Dramatis (Digital Collapse) --}}
        x-transition:leave="transition-all ease-in-out duration-[800ms]"
        x-transition:leave-start="opacity-100 scale-100 filter blur-0"
        x-transition:leave-end="opacity-0 scale-x-0 scale-y-[1.5] filter blur-2xl brightness-200"
        class="fixed inset-0 z-[99999] bg-[#0B0F19] flex flex-col items-center justify-center overflow-hidden overscroll-none">

        <div
            class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-30 mix-blend-overlay pointer-events-none">
        </div>

        <div class="relative z-10 flex flex-col items-center">
            <h1 class="glitch-text text-5xl md:text-7xl font-black text-white tracking-tight mb-6"
                data-text="TUNAS DIGITAL">
                TUNAS DIGITAL
            </h1>

            <p class="text-cyan-500 font-mono text-sm tracking-[0.3em] uppercase animate-pulse mb-12">
                Initializing Core Systems...
            </p>

            <div class="relative w-64 h-[2px] bg-slate-800 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-500 animate-progress-bar">
                </div>
            </div>
        </div>

        <style>
            /* 1. PROGRESS BAR ANIMATION */
            @keyframes progress-bar {
                0% {
                    transform: translateX(-100%);
                }

                50% {
                    transform: translateX(-30%);
                }

                100% {
                    transform: translateX(0%);
                }
            }

            .animate-progress-bar {
                animation: progress-bar 3s ease-in-out forwards;
            }

            /* 2. THE MODERN GLITCH EFFECT CSS */
            .glitch-text {
                position: relative;
                /* Animasi getar keseluruhan */
                animation: glitch-skew 1s infinite linear alternate-reverse;
            }

            /* Pseudo-elements untuk menciptakan bayangan RGB (Cyan & Magenta) */
            .glitch-text::before,
            .glitch-text::after {
                content: attr(data-text);
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: #0B0F19;
                /* Warna background agar menutupi teks asli */
            }

            /* Layer Cyan (Geser kiri) */
            .glitch-text::before {
                left: -3px;
                text-shadow: -2px 0 #00ffff;
                /* Cyan shadow */
                /* Clip path menciptakan efek potongan horizontal */
                clip-path: polygon(0 0, 100% 0, 100% 35%, 0 35%);
                animation: glitch-anim-1 2.5s infinite linear alternate-reverse;
            }

            /* Layer Magenta/Red (Geser kanan) */
            .glitch-text::after {
                left: 3px;
                text-shadow: 2px 0 #ff00ff;
                /* Magenta shadow */
                clip-path: polygon(0 65%, 100% 65%, 100% 100%, 0 100%);
                animation: glitch-anim-2 2s infinite linear alternate-reverse;
            }

            /* Keyframes untuk gerakan potongan Cyan */
            @keyframes glitch-anim-1 {

                0%,
                100% {
                    clip-path: polygon(0 0, 100% 0, 100% 15%, 0 15%);
                    transform: translate(0);
                }

                20% {
                    clip-path: polygon(0 60%, 100% 60%, 100% 75%, 0 75%);
                    transform: translate(-5px);
                }

                40% {
                    clip-path: polygon(0 20%, 100% 20%, 100% 45%, 0 45%);
                    transform: translate(5px);
                }

                60% {
                    clip-path: polygon(0 5%, 100% 5%, 100% 20%, 0 20%);
                    transform: translate(-5px);
                }

                80% {
                    clip-path: polygon(0 40%, 100% 40%, 100% 60%, 0 60%);
                    transform: translate(5px);
                }
            }

            /* Keyframes untuk gerakan potongan Magenta */
            @keyframes glitch-anim-2 {

                0%,
                100% {
                    clip-path: polygon(0 85%, 100% 85%, 100% 100%, 0 100%);
                    transform: translate(0);
                }

                15% {
                    clip-path: polygon(0 15%, 100% 15%, 100% 30%, 0 30%);
                    transform: translate(5px);
                }

                35% {
                    clip-path: polygon(0 45%, 100% 45%, 100% 65%, 0 65%);
                    transform: translate(-5px);
                }

                55% {
                    clip-path: polygon(0 0%, 100% 0%, 100% 10%, 0 10%);
                    transform: translate(5px);
                }

                75% {
                    clip-path: polygon(0 70%, 100% 70%, 100% 90%, 0 90%);
                    transform: translate(-5px);
                }
            }

            /* Keyframes untuk getaran teks utama */
            @keyframes glitch-skew {

                0%,
                100% {
                    transform: skew(0deg);
                }

                20% {
                    transform: skew(-2deg);
                }

                40% {
                    transform: skew(4deg);
                }

                60% {
                    transform: skew(-4deg);
                }

                80% {
                    transform: skew(2deg);
                }
            }
        </style>
    </div>

    {{-- CUSTOM CURSOR --}}
    <div x-data="{
        x: 0,
        y: 0,
        hover: false,
        init() {
            window.addEventListener('mousemove', (e) => {
                this.x = e.clientX;
                this.y = e.clientY;
            });
            // Deteksi elemen yang bisa diklik untuk memperbesar kursor
            document.querySelectorAll('a, button, input, textarea').forEach(el => {
                el.addEventListener('mouseenter', () => this.hover = true);
                el.addEventListener('mouseleave', () => this.hover = false);
            });
        }
    }" class="fixed inset-0 pointer-events-none z-[9999] hidden md:block">

        <div class="absolute w-2 h-2 bg-cyan-400 rounded-full transform -translate-x-1/2 -translate-y-1/2 transition-transform duration-75 mix-blend-difference"
            :style="`top: ${y}px; left: ${x}px;`"></div>

        <div class="absolute border border-cyan-500/50 rounded-full transform -translate-x-1/2 -translate-y-1/2 transition-all duration-300 ease-out mix-blend-difference"
            :class="hover ? 'w-16 h-16 bg-cyan-500/20 border-cyan-400' : 'w-8 h-8'"
            :style="`top: ${y}px; left: ${x}px;`"></div>
    </div>

    <style>
        /* Sembunyikan kursor asli hanya di body, tapi biarkan di iframe/input jika perlu */
        body {
            cursor: none;
        }

        a,
        button,
        input {
            cursor: none;
        }
    </style>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js"></script>

    <script>
        // Init AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 50,
        });

        // Init Tilt (Efek 3D pada elemen dengan class .js-tilt)
        VanillaTilt.init(document.querySelectorAll(".js-tilt"), {
            max: 15, // Kemiringan maksimal
            speed: 400,
            glare: true,
            "max-glare": 0.2,
        });
    </script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('sfx', {
                isMuted: localStorage.getItem('sfxMuted') === 'true',

                // Inisialisasi Audio Context (Browser Audio Engine)
                audioCtx: null,

                init() {
                    // AudioContext hanya dibuat saat user berinteraksi pertama kali
                    // untuk mematuhi kebijakan browser modern
                },

                getContext() {
                    if (!this.audioCtx) {
                        this.audioCtx = new(window.AudioContext || window.webkitAudioContext)();
                    }
                    return this.audioCtx;
                },

                // Generator Suara Sintesis (The Cyberpunk Way)
                playTone(freq, type, duration, vol) {
                    if (this.isMuted) return;

                    const ctx = this.getContext();
                    const osc = ctx.createOscillator();
                    const gain = ctx.createGain();

                    osc.type = type; // 'sine', 'square', 'sawtooth', 'triangle'
                    osc.frequency.setValueAtTime(freq, ctx.currentTime);

                    // Efek Fade Out agar suara tidak "kaget"
                    gain.gain.setValueAtTime(vol, ctx.currentTime);
                    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + duration);

                    osc.connect(gain);
                    gain.connect(ctx.destination);

                    osc.start();
                    osc.stop(ctx.currentTime + duration);
                },

                // 1. Suara Hover (High Tech Blip - Sine Wave)
                playHover() {
                    // Frekuensi 800Hz, tipe sine, durasi 0.1 detik
                    this.playTone(600, 'sine', 0.1, 0.05);
                },

                // 2. Suara Klik (Mechanical/Digital Click - Square Wave)
                playClick() {
                    // Frekuensi 300Hz, tipe square (lebih kasar), durasi 0.15 detik
                    this.playTone(300, 'square', 0.15, 0.05);
                },

                toggleMute() {
                    this.isMuted = !this.isMuted;
                    localStorage.setItem('sfxMuted', this.isMuted);
                }
            });
        });
    </script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.directive('scramble', (el, {
                value,
                modifiers,
                expression
            }, {
                Alpine,
                effect,
                cleanup
            }) => {
                let originalText = el.innerText;
                let iterations = 0;
                let interval = null;
                const characters =
                    'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?'; // Karakter acak

                // Opsi kecepatan (bisa diatur lewat modifier, misal x-scramble.slow)
                let speed = modifiers.includes('slow') ? 60 : 30;

                const startScramble = () => {
                    clearInterval(interval);
                    iterations = 0;

                    interval = setInterval(() => {
                        el.innerText = originalText
                            .split("")
                            .map((letter, index) => {
                                if (index < iterations) {
                                    return originalText[
                                        index]; // Huruf asli sudah terungkap
                                }
                                return characters[Math.floor(Math.random() * characters
                                    .length)]; // Huruf acak
                            })
                            .join("");

                        if (iterations >= originalText.length) {
                            clearInterval(interval);
                        }

                        iterations += 1 / 3; // Kecepatan pengungkapan huruf
                    }, speed);
                };

                // Jalankan saat elemen masuk viewport (terlihat di layar)
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            startScramble();
                            // Opsional: stop observe jika ingin animasi hanya sekali
                            // observer.unobserve(el);
                        }
                    });
                });

                observer.observe(el);

                // Cleanup saat elemen dihapus
                cleanup(() => {
                    clearInterval(interval);
                    observer.disconnect();
                });

                // Efek hover (Opsional: scramble ulang saat di-hover)
                if (modifiers.includes('hover')) {
                    el.addEventListener('mouseenter', startScramble);
                }
            });
        });
    </script>

</body>

</html>
