<div>
    <div class="mb-8">
        <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">Edit Home Page</h2>
        <p class="text-cyan-400/70 font-mono text-sm mt-2">Manage your website's home page content</p>
    </div>

    <form wire:submit.prevent="save" class="space-y-8">
        <!-- Hero Section -->
        <div class="bg-gradient-to-br from-[#1a2f4a]/50 to-[#0f172a]/50 rounded-xl backdrop-blur-sm border border-cyan-500/20 p-8 shadow-[0_0_30px_rgba(6,182,212,0.1)]">
            <h3 class="text-xl font-bold text-cyan-300 mb-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
                Hero & Call to Action
            </h3>
            <p class="text-cyan-400/70 text-sm mb-6 font-mono">Atur konten utama yang muncul di bagian paling atas website.</p>

            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Main Title (Glitch)</label>
                    <input type="text" wire:model="hero_title" required
                        class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent backdrop-blur-sm transition-all">
                    @error('hero_title')
                        <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Subtitle Narrative</label>
                    <textarea wire:model="hero_subtitle" rows="3" required
                        class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent backdrop-blur-sm transition-all resize-none"></textarea>
                    @error('hero_subtitle')
                        <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Button Text</label>
                        <input type="text" wire:model="cta_text" required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent backdrop-blur-sm transition-all">
                        @error('cta_text')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Button Destination (URL)</label>
                        <input type="url" wire:model="cta_link" placeholder="https://..."
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent backdrop-blur-sm transition-all">
                        @error('cta_link')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Metrics Section -->
        <div class="bg-gradient-to-br from-[#2a1f4a]/50 to-[#0f172a]/50 rounded-xl backdrop-blur-sm border border-purple-500/20 p-8 shadow-[0_0_30px_rgba(147,51,234,0.1)]">
            <h3 class="text-xl font-bold text-purple-300 mb-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-purple-400 rounded-full"></span>
                Real-time Metrics
            </h3>
            <p class="text-purple-400/70 text-sm mb-6 font-mono">Angka-angka statistik yang membuktikan kualitas kerja.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Happy Clients 👥</label>
                    <input type="number" wire:model="stats_clients" required
                        class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent backdrop-blur-sm transition-all">
                    @error('stats_clients')
                        <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Projects Done 🚀</label>
                    <input type="number" wire:model="stats_projects" required
                        class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent backdrop-blur-sm transition-all">
                    @error('stats_projects')
                        <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Years Experience ⏳</label>
                    <input type="number" wire:model="stats_years" required
                        class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent backdrop-blur-sm transition-all">
                    @error('stats_years')
                        <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Multimedia Assets -->
        <div class="bg-gradient-to-br from-[#1a2f4a]/50 to-[#0f172a]/50 rounded-xl backdrop-blur-sm border border-cyan-500/20 p-8 shadow-[0_0_30px_rgba(6,182,212,0.1)]">
            <h3 class="text-xl font-bold text-cyan-300 mb-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
                Multimedia Assets
            </h3>
            <p class="text-cyan-400/70 text-sm mb-6 font-mono">Video YouTube dan Asset gambar pendukung.</p>

            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">YouTube Video URL</label>
                    <input type="url" wire:model="video_url" placeholder="https://www.youtube.com/watch?v=..."
                        class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent backdrop-blur-sm transition-all">
                    <p class="text-xs text-gray-500 font-mono mt-2">Gunakan link lengkap dari YouTube.</p>
                    @error('video_url')
                        <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Hero Background/Side Image</label>
                    <div class="border-2 border-dashed border-cyan-500/30 rounded-lg p-6 bg-[#0f172a]/30 hover:border-cyan-500/50 transition-all">
                        @if ($hero_image_preview)
                            <div class="mb-4 relative">
                                <img src="{{ $hero_image_preview }}" alt="Hero Preview"
                                    class="h-48 w-full object-cover rounded-lg border border-cyan-500/30">
                            </div>
                        @endif
                        <input type="file" wire:model="hero_image" accept="image/*"
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 file:bg-gradient-to-r file:from-cyan-500 file:to-purple-600 file:text-white file:border-0 file:px-4 file:py-2 file:rounded-lg file:cursor-pointer transition-all">
                        <p class="text-xs text-gray-500 font-mono mt-2">PNG, JPG, GIF up to 5MB</p>
                    </div>
                    @error('hero_image')
                        <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex gap-4">
            <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider">
                Save Changes
            </button>
            <a href="{{ route('admin.dashboard') }}"
                class="px-6 py-3 border border-gray-600 text-gray-300 rounded-lg hover:border-gray-400 hover:text-gray-200 transition font-semibold">
                Cancel
            </a>
        </div>
    </form>
</div>
