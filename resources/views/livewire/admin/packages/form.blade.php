<div>
    <div class="mb-8">
        <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">
            {{ $isEdit ? 'Edit Pricing Package' : 'Create New Pricing Package' }}</h2>
        <p class="text-cyan-400/70 font-mono text-sm mt-2">
            {{ $isEdit ? 'Update package details and features' : 'Add a new pricing tier to the frontend pricing table' }}</p>
    </div>

    <form wire:submit.prevent="save" class="space-y-8">
        <!-- General Information -->
        <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/30 p-8 shadow-[0_0_30px_rgba(6,182,212,0.1)]">
            <h3 class="text-xl font-bold text-cyan-300 mb-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
                General Information
            </h3>
            <p class="text-cyan-400/70 text-sm mb-6 font-mono">Detail utama paket harga Anda.</p>

            <div class="space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Package Name</label>
                        <input type="text" wire:model="name" placeholder="e.g. Starter, Pro, Enterprise" required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                        @error('name')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Category / Section</label>
                        <select wire:model="package_category_id" required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('package_category_id')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Price (IDR)</label>
                        <input type="number" wire:model="price" placeholder="e.g. 5000000" required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                        @error('price')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Period / Billing Term</label>
                        <input type="text" wire:model="period" placeholder="e.g. / project, / month" required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                        @error('period')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Short Description</label>
                    <textarea wire:model="description" rows="3" placeholder="Explain the main target audience or goal for this package..."
                        class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all resize-none"></textarea>
                    @error('description')
                        <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Features List -->
        <div class="bg-gradient-to-br from-[#2a1f4a] to-[#0f172a] rounded-xl border border-purple-500/30 p-8 shadow-[0_0_30px_rgba(147,51,234,0.1)]">
            <h3 class="text-xl font-bold text-purple-300 mb-2 flex items-center gap-2">
                <span class="w-2 h-2 bg-purple-400 rounded-full"></span>
                Package Features
            </h3>
            <p class="text-purple-400/70 text-sm mb-6 font-mono">Daftar fitur atau benefit yang didapatkan dari paket ini.</p>

            <div class="space-y-4">
                @foreach ($features as $index => $feature)
                    <div class="flex items-center gap-3">
                        <div class="flex-1">
                            <input type="text" wire:model="features.{{ $index }}" placeholder="e.g. Responsive Design, SEO Friendly, 5 Pages" required
                                class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                            @error("features.{$index}")
                                <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                            @enderror
                        </div>
                        @if (count($features) > 1)
                            <button type="button" wire:click="removeFeature({{ $index }})"
                                class="p-3 bg-red-950/40 hover:bg-red-900/60 border border-red-500/30 hover:border-red-500/60 text-red-400 rounded-lg transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        @endif
                    </div>
                @endforeach
            </div>

            <button type="button" wire:click="addFeature"
                class="mt-4 px-4 py-2 bg-[#9333ea]/20 to-transparent border border-purple-500/30 text-purple-300 rounded-lg hover:border-purple-500/70 hover:bg-purple-500/30 text-sm font-semibold transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Feature
            </button>
        </div>

        <!-- Additional Settings -->
        <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/30 p-8 shadow-[0_0_30px_rgba(6,182,212,0.1)]">
            <h3 class="text-xl font-bold text-cyan-300 mb-6 flex items-center gap-2">
                <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
                Additional Options
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest font-mono">Custom CTA WhatsApp Link (Optional)</label>
                    <input type="url" wire:model="cta_link" placeholder="e.g. https://wa.me/..."
                        class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                    <p class="text-xs text-gray-500 font-mono mt-2">Leave blank to automatically generate a standard WhatsApp message based on the package name.</p>
                    @error('cta_link')
                        <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <label class="flex items-center cursor-pointer gap-3 px-5 py-4 rounded-xl border border-cyan-500/30 hover:border-cyan-500/50 transition-all bg-[#0f172a] w-full">
                        <input type="checkbox" wire:model="is_popular" class="w-5 h-5 rounded accent-cyan-500 border-cyan-500/30 bg-[#0f172a]">
                        <div>
                            <span class="text-sm font-bold text-cyan-300 block">Mark as Popular</span>
                            <span class="text-xs text-gray-500 block mt-0.5">Highlights this package on the pricing table to capture attention.</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-4 pt-4">
            <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider">
                {{ $isEdit ? 'Update Package' : 'Create Package' }}
            </button>
            <a href="{{ route('admin.packages.index') }}"
                class="px-6 py-3 border border-gray-600 text-gray-300 rounded-lg hover:border-gray-400 hover:text-gray-200 transition font-semibold">
                Cancel
            </a>
        </div>
    </form>
</div>
