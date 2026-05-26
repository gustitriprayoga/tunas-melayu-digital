<div>
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent uppercase tracking-tight">Client Testimonials</h2>
            <p class="text-cyan-400/70 font-mono text-sm mt-2 tracking-widest">Manage trust signals and social proof</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Form Section -->
        <div class="lg:col-span-1">
            <div class="bg-gradient-to-br from-[#1a2f4a]/50 to-[#0f172a]/50 rounded-2xl border border-cyan-500/20 p-6 shadow-2xl backdrop-blur-xl">
                <h3 class="text-xl font-bold text-cyan-300 mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></span>
                    {{ $editingTestimonialId ? 'Edit Feedback' : 'New Feedback' }}
                </h3>

                <form wire:submit.prevent="save" class="space-y-5">
                    <div>
                        <label class="block text-[10px] font-bold text-cyan-400/50 mb-1.5 uppercase tracking-[0.2em] font-mono">Client Name</label>
                        <input type="text" wire:model="name" placeholder="Full name..." required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-xl bg-[#0f172a]/80 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 transition-all">
                        @error('name') <p class="text-red-400 text-[10px] mt-1 font-mono">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-cyan-400/50 mb-1.5 uppercase tracking-[0.2em] font-mono">Position</label>
                            <input type="text" wire:model="position" placeholder="CEO, Manager..." required
                                class="w-full px-4 py-3 border border-cyan-500/30 rounded-xl bg-[#0f172a]/80 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 transition-all">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-cyan-400/50 mb-1.5 uppercase tracking-[0.2em] font-mono">Company</label>
                            <input type="text" wire:model="company" placeholder="PT. XYZ..."
                                class="w-full px-4 py-3 border border-cyan-500/30 rounded-xl bg-[#0f172a]/80 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-cyan-400/50 mb-1.5 uppercase tracking-[0.2em] font-mono">Rating (1-5)</label>
                        <select wire:model="rating" 
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-xl bg-[#0f172a]/80 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500/50 transition-all">
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}">{{ str_repeat('⭐', $i) }} {{ $i }} Stars</option>
                            @endfor
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-cyan-400/50 mb-1.5 uppercase tracking-[0.2em] font-mono">Feedback Content</label>
                        <textarea wire:model="content" rows="4" placeholder="What did they say about your service?" required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-xl bg-[#0f172a]/80 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 transition-all resize-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-cyan-400/50 mb-1.5 uppercase tracking-[0.2em] font-mono">Client Photo</label>
                        <div class="relative group">
                            <input type="file" wire:model="avatar" accept="image/*"
                                class="w-full px-4 py-3 border border-dashed border-cyan-500/30 rounded-xl bg-[#0f172a]/30 text-xs text-gray-500 file:bg-cyan-500/10 file:text-cyan-400 file:border-0 file:rounded-lg file:px-3 file:py-1 file:mr-4 cursor-pointer">
                        </div>
                    </div>

                    <label class="flex items-center gap-3 p-3 rounded-xl border border-cyan-500/20 bg-[#0f172a]/40 cursor-pointer group">
                        <input type="checkbox" wire:model="is_featured" class="w-4 h-4 rounded accent-cyan-500">
                        <span class="text-xs font-bold text-cyan-200 group-hover:text-cyan-400 transition-colors uppercase tracking-widest">Pin to Featured</span>
                    </label>

                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                            class="flex-1 py-3 bg-gradient-to-r from-cyan-600 to-blue-600 text-white rounded-xl font-bold uppercase tracking-wider text-xs hover:shadow-[0_0_20px_rgba(6,182,212,0.3)] transition-all">
                            {{ $editingTestimonialId ? 'Update Entry' : 'Post Testimonial' }}
                        </button>
                        @if($editingTestimonialId)
                            <button type="button" wire:click="resetForm"
                                class="px-4 py-3 border border-gray-600 text-gray-400 rounded-xl hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke-width="2"/></svg>
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- List Section -->
        <div class="lg:col-span-2 space-y-6">
            {{-- Search & Stats --}}
            <div class="bg-[#0f172a]/50 rounded-xl border border-cyan-500/10 p-4 flex items-center gap-4">
                <div class="relative flex-grow">
                    <input type="text" wire:model.live="search" placeholder="Search by name or company..."
                        class="w-full bg-transparent border-0 focus:ring-0 text-cyan-300 placeholder-gray-600 text-sm">
                </div>
                <div class="h-8 w-[1px] bg-cyan-500/20"></div>
                <span class="text-[10px] font-mono text-cyan-400/50 uppercase tracking-widest">{{ $testimonials->total() }} Total Results</span>
            </div>

            {{-- Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($testimonials as $item)
                    <div class="bg-gradient-to-br from-[#1a2f4a]/30 to-[#0f172a]/80 rounded-2xl border border-white/5 p-5 relative group hover:border-cyan-500/30 transition-all duration-500">
                        @if($item->is_featured)
                            <div class="absolute -top-2 -right-2 bg-amber-500 text-black text-[8px] font-black px-2 py-0.5 rounded uppercase tracking-tighter z-10">Featured</div>
                        @endif

                        <div class="flex items-start gap-4 mb-4">
                            @if($item->getFirstMediaUrl('avatar'))
                                <img src="{{ $item->getFirstMediaUrl('avatar') }}" class="w-12 h-12 rounded-xl object-cover ring-2 ring-cyan-500/20">
                            @else
                                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 font-bold border border-cyan-500/20 text-xl">
                                    {{ substr($item->name, 0, 1) }}
                                </div>
                            @endif
                            <div class="min-w-0">
                                <h4 class="text-white font-bold text-sm truncate uppercase tracking-tight">{{ $item->name }}</h4>
                                <p class="text-cyan-400/60 text-[10px] font-mono truncate">{{ $item->position }} @ {{ $item->company }}</p>
                                <div class="flex gap-0.5 mt-1">
                                    @for($i=1; $i<=5; $i++)
                                        <span class="text-[10px] {{ $i <= $item->rating ? 'text-amber-400' : 'text-gray-700' }}">★</span>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <p class="text-gray-400 text-xs leading-relaxed italic mb-6 line-clamp-3">
                            "{{ $item->content }}"
                        </p>

                        <div class="flex items-center justify-between pt-4 border-t border-white/5">
                            <div class="flex gap-3">
                                <button wire:click="edit({{ $item->id }})" class="text-[10px] font-bold text-cyan-400 hover:text-white transition-colors uppercase tracking-widest">Edit</button>
                                <button wire:click="delete({{ $item->id }})" wire:confirm="Delete this feedback?" class="text-[10px] font-bold text-red-400/60 hover:text-red-400 transition-colors uppercase tracking-widest">Remove</button>
                            </div>
                            <button wire:click="toggleFeatured({{ $item->id }})" class="text-[10px] font-bold {{ $item->is_featured ? 'text-amber-400' : 'text-gray-600' }} hover:text-white transition-colors">
                                {{ $item->is_featured ? 'Unpin' : 'Pin' }}
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="md:col-span-2 text-center py-20 bg-[#0f172a]/40 rounded-3xl border border-dashed border-cyan-500/10">
                        <p class="text-gray-600 font-mono text-sm uppercase tracking-[0.3em]">No feedback records found</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="pt-4">
                {{ $testimonials->links() }}
            </div>
        </div>
    </div>
</div>
