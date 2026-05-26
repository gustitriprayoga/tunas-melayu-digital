<div>
    <div class="mb-8 flex justify-between items-start">
        <div>
            <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">Pricing Sections</h2>
            <p class="text-cyan-400/70 font-mono text-sm mt-2">Manage the pricing sections (tabs) on the frontend pricing table</p>
        </div>
        <a href="{{ route('admin.packages.index') }}"
            class="px-5 py-2.5 border border-cyan-500/30 hover:border-cyan-500/60 text-cyan-300 rounded-lg hover:bg-cyan-500/10 transition-all font-semibold uppercase tracking-wider text-sm flex items-center gap-2">
            ← Back to Packages
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Add Category Form -->
        <div class="lg:col-span-1">
            <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/30 p-6 shadow-lg">
                <h3 class="text-xl font-bold text-cyan-300 mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
                    Add New Section
                </h3>

                <form wire:submit.prevent="save" class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Section Name</label>
                        <input type="text" wire:model="name" placeholder="e.g. Website, Jasa 1, Web Hosting" required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                        @error('name')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest font-mono">Sort Order</label>
                        <input type="number" wire:model="sort_order" required
                            class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a] text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
                        @error('sort_order')
                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full px-5 py-3 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider text-sm">
                        Create Section
                    </button>
                </form>
            </div>
        </div>

        <!-- Categories List -->
        <div class="lg:col-span-2">
            <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/30 overflow-hidden shadow-lg">
                <table class="w-full border-collapse">
                    <thead class="bg-[#0d1420] border-b border-cyan-500/30">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Section Name</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Slug / Identifier</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Sort Order</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-cyan-500/20 bg-[#0f172a]/60">
                        @foreach ($categories as $cat)
                            <tr class="hover:bg-cyan-500/5 transition-all">
                                @if ($editingCategoryId === $cat->id)
                                    <!-- Editing Mode -->
                                    <td class="px-6 py-4 text-sm" colspan="2">
                                        <input type="text" wire:model="editingName" required
                                            class="w-full px-3 py-2 border border-purple-500/30 rounded bg-[#0f172a] text-white focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        @error('editingName')
                                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <input type="number" wire:model="editingSortOrder" required
                                            class="w-20 px-3 py-2 border border-purple-500/30 rounded bg-[#0f172a] text-white focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        @error('editingSortOrder')
                                            <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td class="px-6 py-4 text-sm text-right space-x-2">
                                        <button wire:click="update"
                                            class="text-green-400 hover:text-green-300 font-semibold tracking-wide uppercase text-xs hover:underline">
                                            Save
                                        </button>
                                        <button wire:click="cancelEdit"
                                            class="text-gray-400 hover:text-gray-300 font-semibold tracking-wide uppercase text-xs hover:underline">
                                            Cancel
                                        </button>
                                    </td>
                                @else
                                    <!-- Normal Mode -->
                                    <td class="px-6 py-4 text-sm text-white font-medium">
                                        {{ $cat->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-cyan-300 font-mono">
                                        {{ $cat->slug }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-purple-300 font-mono">
                                        {{ $cat->sort_order }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-right space-x-3">
                                        <button wire:click="startEdit({{ $cat->id }})"
                                            class="text-cyan-400 hover:text-cyan-300 font-semibold tracking-wide uppercase text-xs hover:underline">
                                            Edit
                                        </button>
                                        @if ($cat->slug !== 'website' && $cat->slug !== 'jasa')
                                            <button wire:click="deleteCategory({{ $cat->id }})" wire:confirm="Are you sure you want to delete this section? This will delete all packages under this section."
                                                class="text-red-400 hover:text-red-300 font-semibold tracking-wide uppercase text-xs hover:underline">
                                                Delete
                                            </button>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
