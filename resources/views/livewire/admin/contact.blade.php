<div>
    <div class="mb-8">
        <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent uppercase tracking-tight">Contact & Location</h2>
        <p class="text-cyan-400/70 font-mono text-sm mt-2 tracking-widest">Global connection parameters and HQ location</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Communication Matrix -->
        <div class="bg-gradient-to-br from-[#1a2f4a]/50 to-[#0f172a]/50 rounded-2xl border border-cyan-500/20 p-8 shadow-2xl backdrop-blur-xl">
            <h3 class="text-xl font-bold text-cyan-300 mb-6 flex items-center gap-2">
                <span class="w-2 h-2 bg-cyan-400 rounded-full animate-ping"></span>
                Communication Matrix
            </h3>

            <form wire:submit.prevent="save" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-bold text-cyan-400/50 mb-1.5 uppercase tracking-[0.2em] font-mono">Support Email</label>
                        <input type="email" wire:model="support_email" placeholder="support@tunasmelayu.com" required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-xl bg-[#0f172a]/80 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-cyan-400/50 mb-1.5 uppercase tracking-[0.2em] font-mono">Office Phone</label>
                        <input type="text" wire:model="support_phone" placeholder="+62 812..." required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-xl bg-[#0f172a]/80 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-cyan-400/50 mb-1.5 uppercase tracking-[0.2em] font-mono">WhatsApp Hotlink (Number Only)</label>
                    <input type="text" wire:model="whatsapp_number" placeholder="628123456789" required
                        class="w-full px-4 py-3 border border-cyan-500/30 rounded-xl bg-[#0f172a]/80 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 transition-all">
                    <p class="text-[9px] text-gray-500 mt-2 font-mono italic">Format: Country code + Number (e.g. 628123456789)</p>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-cyan-400/50 mb-1.5 uppercase tracking-[0.2em] font-mono">Headquarters Address</label>
                    <textarea wire:model="office_address" rows="3" placeholder="Jl. Sudirman No. 123..." required
                        class="w-full px-4 py-3 border border-cyan-500/30 rounded-xl bg-[#0f172a]/80 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 transition-all resize-none"></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full py-4 bg-gradient-to-r from-cyan-600 to-blue-600 text-white rounded-xl font-black uppercase tracking-widest text-xs hover:shadow-[0_0_30px_rgba(6,182,212,0.4)] transition-all transform active:scale-[0.98]">
                        Synchronize Settings
                    </button>
                </div>
            </form>
        </div>

        <!-- Geo-Location Data -->
        <div class="space-y-8">
            <div class="bg-gradient-to-br from-[#2a1f4a]/50 to-[#0f172a]/50 rounded-2xl border border-purple-500/20 p-8 shadow-2xl backdrop-blur-xl">
                <h3 class="text-xl font-bold text-purple-300 mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></span>
                    Geo-Location Assets
                </h3>
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-bold text-purple-400/50 mb-1.5 uppercase tracking-[0.2em] font-mono">Google Maps Embed HTML</label>
                        <textarea wire:model.blur="google_maps_embed" rows="6" placeholder="<iframe src='...' ></iframe>"
                            class="w-full px-4 py-3 border border-purple-500/30 rounded-xl bg-[#0f172a]/80 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition-all resize-none font-mono text-xs"></textarea>
                        <p class="text-[9px] text-gray-500 mt-2 font-mono italic">Paste the entire <iframe> tag from Google Maps Share menu.</p>
                    </div>

                    @if($google_maps_embed)
                        <div class="rounded-xl overflow-hidden border border-purple-500/20 aspect-video relative group">
                            <div class="absolute inset-0 bg-[#0f172a] animate-pulse flex items-center justify-center -z-10">
                                <span class="text-xs text-gray-600 font-mono uppercase">Initializing Map...</span>
                            </div>
                            {!! $google_maps_embed !!}
                        </div>
                    @else
                        <div class="rounded-xl border border-dashed border-gray-700 aspect-video flex flex-col items-center justify-center p-6 text-center">
                            <svg class="w-12 h-12 text-gray-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke-width="1.5"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="1.5"/></svg>
                            <p class="text-xs text-gray-600 font-mono uppercase">Map Preview Unavailable</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
