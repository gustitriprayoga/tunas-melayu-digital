<div x-data="whatsappWidget()" x-init="initWidget()" wire:ignore
    class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-4">

    {{-- 1. CHAT WINDOW POPUP --}}
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-10 scale-90"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-10 scale-90"
        class="w-[350px] bg-[#0F1623]/95 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden origin-bottom-right"
        style="display: none;">
        <div
            class="bg-gradient-to-r from-green-600 to-emerald-600 p-4 flex items-center gap-4 relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>

            <div class="relative">
                <div class="w-12 h-12 bg-white rounded-full p-1 flex items-center justify-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/4525/4525981.png"
                        class="w-full h-full object-cover">
                </div>
                <div
                    class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-green-600 rounded-full animate-pulse">
                </div>
            </div>

            <div class="relative z-10">
                <h3 class="font-bold text-white text-lg">{{ $companyName }}</h3>
                <p class="text-green-100 text-xs flex items-center gap-1">
                    <span x-show="!isTyping">Typically replies instantly</span>
                    <span x-show="isTyping" class="animate-pulse">Typing...</span>
                </p>
            </div>

            <button @click="isOpen = false" class="absolute top-4 right-4 text-white/80 hover:text-white">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div
            class="p-4 h-[300px] overflow-y-auto bg-[url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png')] bg-repeat opacity-90 relative">
            <div class="absolute inset-0 bg-[#0B0F19]/90"></div>
            <div class="relative z-10 space-y-4">
                <p class="text-xs text-center text-slate-500 my-4">Today</p>

                <div class="flex gap-3" data-aos="fade-up">
                    <div
                        class="bg-white/10 border border-white/5 text-slate-300 p-3 rounded-2xl rounded-tl-none text-sm max-w-[80%] shadow-lg">
                        Selamat datang di {{ $companyName }}! 👋
                    </div>
                </div>

                <div x-show="isTyping" class="flex gap-3">
                    <div
                        class="bg-white/10 border border-white/5 p-4 rounded-2xl rounded-tl-none w-16 flex items-center justify-center gap-1">
                        <span class="w-2 h-2 bg-slate-400 rounded-full animate-bounce"></span>
                        <span class="w-2 h-2 bg-slate-400 rounded-full animate-bounce"
                            style="animation-delay: 0.2s"></span>
                        <span class="w-2 h-2 bg-slate-400 rounded-full animate-bounce"
                            style="animation-delay: 0.4s"></span>
                    </div>
                </div>

                <div x-show="showWelcomeMessage" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0" class="flex gap-3">
                    <div
                        class="bg-gradient-to-br from-green-600/20 to-emerald-600/20 border border-green-500/30 text-white p-3 rounded-2xl rounded-tl-none text-sm max-w-[85%] shadow-lg">
                        Ada proyek gila yang ingin direalisasikan? Ceritakan pada kami! 🚀
                    </div>
                </div>
            </div>
        </div>

        <div class="p-4 bg-[#0F1623] border-t border-white/10">
            <div class="relative">
                <input type="text" x-model="message" @keydown.enter="sendMessage" placeholder="Ketik pesan..."
                    class="w-full bg-slate-900 border border-slate-700 rounded-full py-3 pl-4 pr-12 text-sm text-white focus:outline-none focus:border-green-500 transition shadow-inner">
                <button @click="sendMessage"
                    class="absolute right-1 top-1 bottom-1 w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white hover:bg-green-400 transition shadow-lg hover:shadow-green-500/50">
                    <svg class="w-4 h-4 transform rotate-90 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>


    {{-- 2. FLOATING TRIGGER BUTTON --}}
    <button @click="toggleChat"
        class="relative group w-16 h-16 flex items-center justify-center rounded-full transition-all duration-300 hover:scale-110"
        :class="isOpen ? 'rotate-90' : ''">
        <span class="absolute inline-flex h-full w-full rounded-full bg-green-500 opacity-20 animate-ping"></span>
        <span
            class="absolute inline-flex h-full w-full rounded-full bg-green-500 opacity-10 animate-pulse delay-75"></span>

        <div
            class="relative w-full h-full bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow-[0_0_30px_rgba(34,197,94,0.6)] border border-green-400 group-hover:shadow-[0_0_50px_rgba(34,197,94,0.8)] z-10">

            <svg x-show="!isOpen" class="w-8 h-8 text-white drop-shadow-md" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487 2.082.899 2.503.719 2.949.679.446-.04 1.437-.586 1.64-1.15.203-.566.203-1.052.142-1.15z" />
            </svg>

            <svg x-show="isOpen" x-cloak class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>

        <span x-show="!isOpen && showNotification" x-transition
            class="absolute -top-1 -right-1 flex h-6 w-6 items-center justify-center rounded-full bg-red-500 ring-2 ring-[#0B0F19] text-[10px] font-bold text-white shadow-lg">1</span>
    </button>

    <script>
        function whatsappWidget() {
            return {
                isOpen: false,
                isTyping: false,
                showWelcomeMessage: false,
                showNotification: false,
                message: '',
                waNumber: '{{ $whatsappNumber }}',

                initWidget() {
                    // Munculkan notifikasi merah setelah 3 detik
                    setTimeout(() => {
                        this.showNotification = true;
                    }, 3000);
                },

                toggleChat() {
                    this.isOpen = !this.isOpen;

                    if (this.isOpen) {
                        this.showNotification = false; // Hilangkan badge merah

                        // Simulasi Admin Mengetik
                        if (!this.showWelcomeMessage) {
                            setTimeout(() => {
                                this.isTyping = true;
                                setTimeout(() => {
                                    this.isTyping = false;
                                    this.showWelcomeMessage = true;
                                    // Play sound effect (optional)
                                    // new Audio('/sounds/pop.mp3').play().catch(e => {});
                                }, 1500); // Admin mengetik selama 1.5 detik
                            }, 500); // Mulai mengetik setelah 0.5 detik dibuka
                        }
                    }
                },

                sendMessage() {
                    if (this.message.trim() === '') return;

                    const text = encodeURIComponent(this.message);
                    const url = `https://wa.me/${this.waNumber}?text=${text}`;

                    // Buka WhatsApp di tab baru
                    window.open(url, '_blank');

                    // Reset input
                    this.message = '';
                    this.isOpen = false;
                }
            }
        }
    </script>
</div>
