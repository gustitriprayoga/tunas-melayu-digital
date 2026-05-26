<div>
    <div class="mb-8">
        <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">
            {{ $isEdit ? 'Edit Service' : 'Create New Service' }}</h2>
        <p class="text-cyan-400/70 font-mono text-sm mt-2">
            {{ $isEdit ? 'Update service details' : 'Add a new service to your portfolio' }}</p>
    </div>

    <form wire:submit.prevent="save" class="space-y-8">
        <!-- General Information -->
        <div class="bg-gradient-to-br from-[#1a2f4a]/50 to-[#0f172a]/50 rounded-xl backdrop-blur-sm border border-cyan-500/20 p-8 shadow-[0_0_30px_rgba(6,182,212,0.1)]">
            <h3 class="text-xl font-bold text-cyan-300 mb-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
                General Information
            </h3>
            <p class="text-cyan-400/70 text-sm mb-6 font-mono">Detail utama layanan Anda.</p>

            <div class="space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Title</label>
                        <input type="text" wire:model.live="title" required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent backdrop-blur-sm transition-all">
                        @error('title')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Slug</label>
                        <input type="text" wire:model="slug" disabled
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-gray-500 cursor-not-allowed opacity-60 backdrop-blur-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Icon</label>
                        <input type="text" wire:model="icon" placeholder="heroicon-o-cpu-chip" required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent backdrop-blur-sm transition-all">
                        <p class="text-xs text-gray-500 font-mono mt-2">See heroicons.com for icon names</p>
                        @error('icon')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-end">
                        <label class="flex items-center cursor-pointer gap-2 px-4 py-3 rounded-lg border border-cyan-500/30 hover:border-cyan-500/50 transition-all bg-[#0f172a]/30">
                            <input type="checkbox" wire:model="is_active" class="w-4 h-4 rounded accent-cyan-500">
                            <span class="text-sm font-semibold text-cyan-300">Tampilkan Layanan</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Card Description</label>
                    <textarea wire:model="short_description" rows="3" placeholder="Muncul di halaman depan/index..." required
                        class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent backdrop-blur-sm transition-all resize-none"></textarea>
                    @error('short_description')
                        <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Detailed Content -->
        <div class="bg-gradient-to-br from-[#2a1f4a]/50 to-[#0f172a]/50 rounded-xl backdrop-blur-sm border border-purple-500/20 p-8 shadow-[0_0_30px_rgba(147,51,234,0.1)]">
            <h3 class="text-xl font-bold text-purple-300 mb-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-purple-400 rounded-full"></span>
                Detailed Content
            </h3>
            <p class="text-purple-400/70 text-sm mb-6 font-mono">Tuliskan detail teknis, keunggulan, dan paket layanan di sini dengan rich text editor.</p>

            <div wire:ignore>
                <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Main Article</label>
                <textarea id="tinymce-editor" wire:model="full_content" required
                    class="w-full"></textarea>
                <p class="text-xs text-gray-500 font-mono mt-2">Full HTML editor dengan formatting, images, tables, dan lainnya</p>
                @error('full_content')
                    <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                @enderror
            </div>
        </div>

        @push('scripts')
        <script src="https://cdn.tiny.cloud/1/n7mdc0wuauc9b9ducn7cpqnsgcoieg36nwehnomvi6kxfmi6/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
        <script>
            document.addEventListener('livewire:init', () => {
                tinymce.init({
                    selector: '#tinymce-editor',
                    skin: 'oxide-dark',
                    content_css: 'dark',
                    height: 500,
                    menubar: true,
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount code fullscreen',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | code fullscreen | removeformat',
                    setup: function(editor) {
                        // Load initial content from Livewire
                        editor.on('init', function() {
                            const content = @this.get('full_content');
                            if (content) {
                                editor.setContent(content);
                            }
                        });
                        
                        // Sync changes back to Livewire
                        editor.on('change keyup paste', function() {
                            @this.set('full_content', editor.getContent());
                        });
                    }
                });
            });
        </script>
        @endpush

        <!-- Visual Asset -->
        <div class="bg-gradient-to-br from-[#1a2f4a]/50 to-[#0f172a]/50 rounded-xl backdrop-blur-sm border border-cyan-500/20 p-8 shadow-[0_0_30px_rgba(6,182,212,0.1)]">
            <h3 class="text-xl font-bold text-cyan-300 mb-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
                Visual Asset
            </h3>

            <div class="border-2 border-dashed border-cyan-500/30 rounded-lg p-6 bg-[#0f172a]/30 hover:border-cyan-500/50 transition-all">
                @if ($service_image_preview)
                    <div class="mb-4">
                        <img src="{{ $service_image_preview }}" alt="Service Preview"
                            class="h-48 w-full object-cover rounded-lg border border-cyan-500/30">
                    </div>
                @endif
                <input type="file" wire:model="service_image" accept="image/*"
                    class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500 file:bg-gradient-to-r file:from-cyan-500 file:to-purple-600 file:text-white file:border-0 file:px-4 file:py-2 file:rounded-lg file:cursor-pointer transition-all">
                <p class="text-xs text-gray-500 font-mono mt-2">PNG, JPG, GIF up to 5MB</p>
            </div>
            @error('service_image')
                <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
            @enderror
        </div>

        <!-- Extra Details -->
        <div class="bg-gradient-to-br from-[#2a1f4a]/50 to-[#0f172a]/50 rounded-xl backdrop-blur-sm border border-purple-500/20 p-8 shadow-[0_0_30px_rgba(147,51,234,0.1)]">
            <h3 class="text-xl font-bold text-purple-300 mb-6 flex items-center gap-2">
                <span class="w-2 h-2 bg-purple-400 rounded-full"></span>
                Extra Details
            </h3>

            <!-- FAQs -->
            <div class="mb-8">
                <h4 class="font-semibold text-purple-200 mb-4 flex items-center gap-2">
                    <span class="text-xs">⚙️</span> FAQs
                </h4>
                <div class="space-y-4">
                    @foreach ($faqs as $index => $faq)
                        <div class="p-4 border border-purple-500/30 rounded-lg bg-[#0f172a]/30 hover:border-purple-500/50 transition-all">
                            <div class="grid grid-cols-1 gap-3">
                                <input type="text" wire:model="faqs.{{ $index }}.question"
                                    placeholder="Question"
                                    class="px-4 py-2 border border-purple-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all">
                                <textarea wire:model="faqs.{{ $index }}.answer" placeholder="Answer" rows="2"
                                    class="px-4 py-2 border border-purple-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all resize-none"></textarea>
                                @if (count($faqs) > 1)
                                    <button type="button" wire:click="removeFaq({{ $index }})"
                                        class="text-red-400 hover:text-red-300 text-sm font-mono transition-all">
                                        ✕ Remove FAQ
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" wire:click="addFaq()"
                    class="mt-4 px-4 py-2 bg-gradient-to-r from-purple-500/20 to-transparent border border-purple-500/30 text-purple-300 rounded-lg hover:border-purple-500/70 hover:bg-purple-500/30 text-sm font-semibold transition-all">
                    + Add FAQ
                </button>
            </div>

            <!-- Tech Stack -->
            <div class="mb-8">
                <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Tech Stack</label>
                <input type="text" @change="$wire.tech_stack = $event.target.value.split(',').map(t => t.trim())"
                    value="{{ implode(',', $tech_stack) }}" placeholder="Laravel, React, AWS"
                    class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all">
                <p class="text-xs text-gray-500 font-mono mt-2">Separate with commas</p>
            </div>

            <!-- WhatsApp Message -->
            <div>
                <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">WhatsApp Message Template</label>
                <input type="text" wire:model="wa_message"
                    placeholder="Halo, saya tertarik dengan layanan [Service Name]..."
                    class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all">
                <p class="text-xs text-gray-500 font-mono mt-2">Use [Service Name] as placeholder</p>
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex gap-4 pt-4">
            <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider">
                {{ $isEdit ? 'Update Service' : 'Create Service' }}
            </button>
            <a href="{{ route('admin.services.index') }}"
                class="px-6 py-3 border border-gray-600 text-gray-300 rounded-lg hover:border-gray-400 hover:text-gray-200 transition font-semibold">
                Cancel
            </a>
        </div>
    </form>
</div>
