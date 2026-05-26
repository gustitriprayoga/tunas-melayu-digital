<div>
    <div class="mb-8">
        <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">About Page Management</h2>
        <p class="text-cyan-400/70 font-mono text-sm mt-2">Manage your company story, vision, mission, core values, and team members</p>
    </div>

    <div class="space-y-8">

        {{-- ======================== ABOUT CONTENT FORM ======================== --}}
        <form wire:submit.prevent="saveAbout" class="space-y-8">
            <!-- Hero Section -->
            <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/30 p-8 shadow-[0_0_30px_rgba(6,182,212,0.1)]">
                <h3 class="text-xl font-bold text-cyan-300 mb-2 flex items-center gap-2">
                    <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
                    Hero Section
                </h3>
                <p class="text-cyan-400/70 text-sm mb-6 font-mono">Judul dan subtitle hero halaman About.</p>

                <div class="space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Hero Title</label>
                            <input type="text" wire:model="hero_title" placeholder="e.g. Architects of The Future" required
                                class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                            @error('hero_title') <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Founded Year</label>
                            <input type="text" wire:model="founded_year" placeholder="e.g. 2020" required
                                class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Hero Subtitle</label>
                        <textarea wire:model="hero_subtitle" rows="3" placeholder="Tagline yang menginspirasi..." required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all resize-none"></textarea>
                        @error('hero_subtitle') <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Story, Vision, Mission -->
            <div class="bg-gradient-to-br from-[#2a1f4a] to-[#0f172a] rounded-xl border border-purple-500/30 p-8 shadow-[0_0_30px_rgba(147,51,234,0.1)]">
                <h3 class="text-xl font-bold text-purple-300 mb-2 flex items-center gap-2">
                    <span class="w-2 h-2 bg-purple-400 rounded-full"></span>
                    Company Story, Vision & Mission
                </h3>
                <p class="text-purple-400/70 text-sm mb-6 font-mono">Narasi perusahaan yang muncul di halaman About.</p>

                <div class="space-y-5">
                    <div>
                        <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Company Story (Origin)</label>
                        <textarea wire:model="story_content" rows="4" placeholder="Cerita awal mula perusahaan Anda..." required
                            class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all resize-none"></textarea>
                        @error('story_content') <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Vision Statement</label>
                        <textarea wire:model="vision" rows="3" placeholder="Visi perusahaan ke depan..." required
                            class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all resize-none"></textarea>
                        @error('vision') <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Mission Statement</label>
                        <textarea wire:model="mission" rows="4" placeholder="Misi perusahaan..." required
                            class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all resize-none"></textarea>
                        @error('mission') <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Core Values -->
            <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/30 p-8 shadow-[0_0_30px_rgba(6,182,212,0.1)]">
                <h3 class="text-xl font-bold text-cyan-300 mb-2 flex items-center gap-2">
                    <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
                    Core Values
                </h3>
                <p class="text-cyan-400/70 text-sm mb-6 font-mono">Nilai-nilai inti perusahaan yang ditampilkan di halaman About.</p>

                <div class="space-y-4">
                    @foreach ($core_values as $index => $value)
                        <div class="p-5 border border-cyan-500/20 rounded-lg bg-[#0f172a]/50 hover:border-cyan-500/40 transition-all">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <div>
                                    <label class="block text-[10px] text-cyan-400/60 mb-1.5 uppercase font-mono tracking-widest">Icon (heroicon name)</label>
                                    <input type="text" wire:model="core_values.{{ $index }}.icon"
                                        placeholder="heroicon-o-light-bulb"
                                        class="w-full px-3 py-2 border border-cyan-500/20 rounded bg-[#0f172a] text-white text-sm placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                                </div>
                                <div>
                                    <label class="block text-[10px] text-cyan-400/60 mb-1.5 uppercase font-mono tracking-widest">Title</label>
                                    <input type="text" wire:model="core_values.{{ $index }}.title"
                                        placeholder="e.g. Innovation"
                                        class="w-full px-3 py-2 border border-cyan-500/20 rounded bg-[#0f172a] text-white text-sm placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                                </div>
                                <div>
                                    <label class="block text-[10px] text-cyan-400/60 mb-1.5 uppercase font-mono tracking-widest">Description</label>
                                    <div class="flex gap-2">
                                        <input type="text" wire:model="core_values.{{ $index }}.desc"
                                            placeholder="Short description..."
                                            class="flex-1 px-3 py-2 border border-cyan-500/20 rounded bg-[#0f172a] text-white text-sm placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                                        <button type="button" wire:click="removeCoreValue({{ $index }})"
                                            class="p-2 bg-red-950/40 hover:bg-red-900/60 border border-red-500/20 text-red-400 rounded transition-all">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <button type="button" wire:click="addCoreValue"
                        class="mt-2 px-4 py-2 border border-cyan-500/30 text-cyan-300 rounded-lg hover:border-cyan-500/60 hover:bg-cyan-500/10 text-sm font-semibold transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Core Value
                    </button>
                </div>
            </div>

            <!-- About Save Button -->
            <div class="flex gap-4 pt-2">
                <button type="submit"
                    class="px-6 py-3 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider">
                    Save About Page Content
                </button>
            </div>
        </form>

        {{-- ======================== TEAM MANAGEMENT ======================== --}}
        <div class="bg-gradient-to-br from-[#2a1f4a] to-[#0f172a] rounded-xl border border-purple-500/30 p-8 shadow-[0_0_30px_rgba(147,51,234,0.1)]">
            <h3 class="text-xl font-bold text-purple-300 mb-6 flex items-center gap-2">
                <span class="w-2 h-2 bg-purple-400 rounded-full"></span>
                Team Members
            </h3>

            <!-- Team Form -->
            <form wire:submit.prevent="saveTeam" class="space-y-5 p-6 bg-[#0f172a]/50 rounded-xl border border-purple-500/20 mb-8">
                <h4 class="text-base font-semibold text-purple-200 font-mono">
                    {{ $editingTeamId ? '✏️ Editing Team Member' : '➕ Add New Team Member' }}
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Name</label>
                        <input type="text" wire:model="teamName" placeholder="e.g. Alex Handoko" required
                            class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        @error('teamName') <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Position / Role</label>
                        <input type="text" wire:model="teamPosition" placeholder="e.g. CEO, CTO, Lead Developer" required
                            class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        @error('teamPosition') <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Short Bio</label>
                    <textarea wire:model="teamBio" rows="2" placeholder="Brief background and expertise..."
                        class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all resize-none"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">LinkedIn URL</label>
                        <input type="url" wire:model="teamLinkedin" placeholder="https://linkedin.com/..."
                            class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        @error('teamLinkedin') <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">GitHub URL</label>
                        <input type="url" wire:model="teamGithub" placeholder="https://github.com/..."
                            class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Sort Order</label>
                        <input type="number" wire:model="teamSortOrder"
                            class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a] text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-purple-400/70 mb-2 uppercase tracking-widest">Profile Photo</label>
                    <input type="file" wire:model="teamImage" accept="image/*"
                        class="w-full px-4 py-3 border border-purple-500/30 rounded-lg bg-[#0f172a] text-white focus:outline-none focus:ring-2 focus:ring-purple-500 file:bg-gradient-to-r file:from-purple-500 file:to-pink-600 file:text-white file:border-0 file:px-4 file:py-2 file:rounded-lg file:cursor-pointer transition-all">
                    @error('teamImage') <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p> @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit"
                        class="px-5 py-2.5 bg-gradient-to-r from-purple-500 to-pink-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(147,51,234,0.4)] transition-all font-semibold uppercase tracking-wider text-sm">
                        {{ $editingTeamId ? 'Update Member' : 'Add Member' }}
                    </button>
                    @if ($editingTeamId)
                        <button type="button" wire:click="cancelEditTeam"
                            class="px-5 py-2.5 border border-gray-600 text-gray-300 rounded-lg hover:border-gray-400 hover:text-gray-200 transition font-semibold text-sm">
                            Cancel
                        </button>
                    @endif
                </div>
            </form>

            <!-- Team Member List -->
            @if (!empty($teams))
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @foreach ($teams as $member)
                        <div class="flex items-center gap-4 p-4 bg-[#0f172a]/60 rounded-xl border border-purple-500/15 hover:border-purple-500/30 transition-all">
                            <!-- Avatar -->
                            @php
                                $teamModel = \App\Models\Team::find($member['id']);
                                $avatar = $teamModel?->getFirstMediaUrl('avatar');
                            @endphp
                            @if ($avatar)
                                <img src="{{ $avatar }}" alt="{{ $member['name'] }}"
                                    class="w-14 h-14 rounded-2xl object-cover border border-purple-500/30 shrink-0">
                            @else
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-purple-700/30 to-pink-700/30 border border-purple-500/20 flex items-center justify-center shrink-0">
                                    <span class="text-xl font-black text-purple-400">{{ substr($member['name'], 0, 1) }}</span>
                                </div>
                            @endif

                            <!-- Info -->
                            <div class="flex-grow min-w-0">
                                <p class="font-bold text-white text-sm truncate">{{ $member['name'] }}</p>
                                <p class="text-purple-300 text-xs font-mono truncate">{{ $member['position'] }}</p>
                                @if ($member['bio'])
                                    <p class="text-gray-500 text-xs mt-1 line-clamp-1">{{ $member['bio'] }}</p>
                                @endif
                            </div>

                            <!-- Actions -->
                            <div class="flex flex-col gap-1.5 shrink-0">
                                <button wire:click="startEditTeam({{ $member['id'] }})"
                                    class="text-cyan-400 hover:text-cyan-300 text-xs font-semibold uppercase tracking-wide hover:underline text-right">
                                    Edit
                                </button>
                                <button wire:click="deleteTeam({{ $member['id'] }})" wire:confirm="Remove this team member?"
                                    class="text-red-400 hover:text-red-300 text-xs font-semibold uppercase tracking-wide hover:underline text-right">
                                    Remove
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-10 text-gray-500 font-mono text-sm">
                    No team members yet. Add your first team member above.
                </div>
            @endif
        </div>
    </div>
</div>
