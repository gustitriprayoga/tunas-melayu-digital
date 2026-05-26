<div>
    <div class="mb-8">
        <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">
            {{ $isEdit ? 'Edit Portfolio Showcase' : 'Create New Portfolio Showcase' }}</h2>
        <p class="text-cyan-400/70 font-mono text-sm mt-2">
            {{ $isEdit ? 'Update project details, tech stack, and media assets' : 'Add a new client project showcase to the portfolio page' }}</p>
    </div>

    <form wire:submit.prevent="save" class="space-y-8">
        <!-- General Information -->
        <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/30 p-8 shadow-[0_0_30px_rgba(6,182,212,0.1)]">
            <h3 class="text-xl font-bold text-cyan-300 mb-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
                General Information
            </h3>
            <p class="text-cyan-400/70 text-sm mb-6 font-mono">Detail utama proyek portfolio Anda.</p>

            <div class="space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Project Title</label>
                        <input type="text" wire:model.live="title" placeholder="e.g. Sistem Akademik Sekolah, E-Commerce Tunas" required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                        @error('title')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest font-mono">Slug</label>
                        <input type="text" wire:model="slug" disabled
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-gray-500 cursor-not-allowed opacity-60">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Client / Company Name</label>
                        <input type="text" wire:model="client_name" placeholder="e.g. PT. Tunas Jaya, Sekolah Melayu"
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                        @error('client_name')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Live Project URL (Optional)</label>
                        <input type="url" wire:model="url" placeholder="https://client-project.com"
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                        @error('url')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tech Stack Comma Tag Input -->
                <div>
                    <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Tech Stack Used</label>
                    <input type="text" @change="$wire.tech_stack = $event.target.value.split(',').map(t => t.trim()).filter(Boolean)"
                        value="{{ implode(', ', $tech_stack) }}" placeholder="e.g. Laravel, React, TailwindCSS, PostgreSQL"
                        class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                    <p class="text-xs text-gray-500 font-mono mt-2">Separate with commas (e.g. Laravel, React, TailwindCSS)</p>
                </div>
            </div>
        </div>

        <!-- Project Description -->
        <div class="bg-gradient-to-br from-[#2a1f4a] to-[#0f172a] rounded-xl border border-purple-500/30 p-8 shadow-[0_0_30px_rgba(147,51,234,0.1)]">
            <h3 class="text-xl font-bold text-purple-300 mb-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-purple-400 rounded-full"></span>
                Project Description
            </h3>
            <p class="text-purple-400/70 text-sm mb-6 font-mono">Tulis penjelasan detail, studi kasus, solusi, dan hasil pengerjaan proyek di sini.</p>

            <div wire:ignore>
                <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Main Showcase Content</label>
                <textarea id="tinymce-portfolio-editor" wire:model="description" required
                    class="w-full"></textarea>
                <p class="text-xs text-gray-500 font-mono mt-2">Full HTML editor dengan formatting, images, tables, dan lainnya</p>
                @error('description')
                    <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Visual Showcase Asset -->
        <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/30 p-8 shadow-[0_0_30px_rgba(6,182,212,0.1)]">
            <h3 class="text-xl font-bold text-cyan-300 mb-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
                Showcase Cover Image
            </h3>
            <p class="text-cyan-400/70 text-sm mb-6 font-mono">Gambar banner utama proyek untuk halaman list dan detail portfolio.</p>

            <div class="border-2 border-dashed border-cyan-500/30 rounded-lg p-6 bg-[#0f172a]/30 hover:border-cyan-500/50 transition-all">
                @if (!empty($portfolio_image_preview ?? null))
                    <div class="mb-4">
                        <img src="{{ $portfolio_image_preview }}" alt="Portfolio Showcase Preview"
                            class="h-48 w-full object-cover rounded-lg border border-cyan-500/20">
                    </div>
                @endif
                <input type="file" wire:model="portfolio_image" accept="image/*"
                    class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 file:bg-gradient-to-r file:from-cyan-500 file:to-purple-600 file:text-white file:border-0 file:px-4 file:py-2 file:rounded-lg file:cursor-pointer transition-all">
                <p class="text-xs text-gray-500 font-mono mt-2">PNG, JPG, GIF up to 5MB</p>
            </div>
            @error('portfolio_image')
                <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-4 pt-4">
            <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider">
                {{ $isEdit ? 'Update Portfolio' : 'Create Portfolio' }}
            </button>
            <a href="{{ route('admin.portfolio.index') }}"
                class="px-6 py-3 border border-gray-600 text-gray-300 rounded-lg hover:border-gray-400 hover:text-gray-200 transition font-semibold">
                Cancel
            </a>
        </div>
    </form>

    @push('scripts')
    <script src="https://cdn.tiny.cloud/1/n7mdc0wuauc9b9ducn7cpqnsgcoieg36nwehnomvi6kxfmi6/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            tinymce.init({
                selector: '#tinymce-portfolio-editor',
                skin: 'oxide-dark',
                content_css: 'dark',
                height: 500,
                menubar: true,
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code fullscreen',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | code fullscreen | removeformat',
                setup: function(editor) {
                    // Load initial content from Livewire
                    editor.on('init', function() {
                        const content = @this.get('description');
                        if (content) {
                            editor.setContent(content);
                        }
                    });
                    
                    // Sync changes back to Livewire
                    editor.on('change keyup paste', function() {
                        @this.set('description', editor.getContent());
                    });
                }
            });
        });
    </script>
    @endpush
</div>
