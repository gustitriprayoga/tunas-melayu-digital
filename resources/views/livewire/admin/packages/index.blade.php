<div>
    <div class="mb-8 flex justify-between items-start">
        <div>
            <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">Pricing Management</h2>
            <p class="text-cyan-400/70 font-mono text-sm mt-2">Manage all your pricing packages & features</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.packages.categories') }}"
                class="px-5 py-2.5 border border-cyan-500/30 hover:border-cyan-500/60 text-cyan-300 rounded-lg hover:bg-cyan-500/10 transition-all font-semibold uppercase tracking-wider text-sm flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                Manage Sections
            </a>
            <a href="{{ route('admin.packages.create') }}"
                class="px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider text-sm flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Package
            </a>
        </div>
    </div>

    <!-- Search -->
    <div class="mb-6">
        <input type="text" wire:model.live="search" placeholder="Search packages by name..."
            class="w-full px-4 py-3 border border-cyan-500/40 rounded-lg bg-[#0f172a] text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
    </div>

    <!-- Packages Table -->
    <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/40 overflow-hidden shadow-lg">
        @if ($packages->count() > 0)
            <table class="w-full border-collapse">
                <thead class="bg-[#0d1420] border-b border-cyan-500/30">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Category</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Price</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Period</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Popular</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Features Count</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-cyan-500/20 bg-[#0f172a]/60">
                    @foreach ($packages as $package)
                        <tr class="hover:bg-cyan-500/5 transition-all">
                            <td class="px-6 py-4 text-sm text-white font-medium">
                                {{ $package->name }}
                            </td>
                            <td class="px-6 py-4 text-sm font-semibold tracking-wide uppercase font-mono">
                                <span class="px-2.5 py-1 rounded-md text-xs {{ $package->category === 'website' ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20' : 'bg-purple-500/10 text-purple-400 border border-purple-500/20' }}">
                                    {{ $package->categoryRelation->name ?? $package->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-cyan-300 font-mono">
                                Rp {{ number_format($package->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-300">
                                {{ $package->period }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase font-mono {{ $package->is_popular ? 'bg-amber-500/10 text-amber-400 border border-amber-500/20 shadow-[0_0_10px_rgba(245,158,11,0.1)]' : 'bg-gray-500/10 text-gray-400 border border-gray-500/20' }}">
                                    {{ $package->is_popular ? 'Yes' : 'No' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-purple-300 font-mono">
                                {{ is_array($package->features) ? count($package->features) : 0 }} Features
                            </td>
                            <td class="px-6 py-4 text-sm text-right space-x-3">
                                <a href="{{ route('admin.packages.edit', $package) }}"
                                    class="text-cyan-400 hover:text-cyan-300 font-semibold tracking-wide uppercase text-xs hover:underline">
                                    Edit
                                </a>
                                <button wire:click="deletePackage({{ $package->id }})" wire:confirm="Are you sure you want to delete this pricing package?"
                                    class="text-red-400 hover:text-red-300 font-semibold tracking-wide uppercase text-xs hover:underline">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-cyan-500/30 bg-[#0d1420]">
                {{ $packages->links() }}
            </div>
        @else
            <div class="px-6 py-16 text-center">
                <svg class="mx-auto h-12 w-12 text-cyan-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-bold text-white">No pricing packages found</h3>
                <p class="mt-2 text-sm text-cyan-400/50 font-mono">Get started by creating a new pricing package.</p>
                <div class="mt-6">
                    <a href="{{ route('admin.packages.create') }}"
                        class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider text-sm">
                        Create Package
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
