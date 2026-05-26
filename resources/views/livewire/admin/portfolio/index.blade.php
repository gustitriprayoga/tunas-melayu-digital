<div>
    <div class="mb-8 flex justify-between items-start">
        <div>
            <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">Portfolio Management</h2>
            <p class="text-cyan-400/70 font-mono text-sm mt-2">Manage all your client success stories and project showcases</p>
        </div>
        <a href="{{ route('admin.portfolio.create') }}"
            class="px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider text-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Portfolio
        </a>
    </div>

    <!-- Search -->
    <div class="mb-6">
        <input type="text" wire:model.live="search" placeholder="Search portfolios by title or client name..."
            class="w-full px-4 py-3 border border-cyan-500/40 rounded-lg bg-[#0f172a] text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
    </div>

    <!-- Portfolios Table -->
    <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/40 overflow-hidden shadow-lg">
        @if ($portfolios->count() > 0)
            <table class="w-full border-collapse">
                <thead class="bg-[#0d1420] border-b border-cyan-500/30">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Showcase Image</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Project Title</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Client</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Tech Stack</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-cyan-500/20 bg-[#0f172a]/60">
                    @foreach ($portfolios as $portfolio)
                        <tr class="hover:bg-cyan-500/5 transition-all">
                            <td class="px-6 py-4 text-sm">
                                @if ($portfolio->getFirstMediaUrl('portfolio_images'))
                                    <img src="{{ $portfolio->getFirstMediaUrl('portfolio_images') }}" alt="{{ $portfolio->title }}"
                                        class="h-12 w-20 object-cover rounded-lg border border-cyan-500/20">
                                @else
                                    <div class="h-12 w-20 bg-slate-800 rounded-lg flex items-center justify-center border border-white/5">
                                        <span class="text-[9px] text-gray-500 uppercase tracking-wider font-mono">No Image</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-white font-medium">
                                {{ $portfolio->title }}
                            </td>
                            <td class="px-6 py-4 text-sm text-cyan-300 font-mono">
                                {{ $portfolio->client_name ?: '-' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-300">
                                <div class="flex flex-wrap gap-1 max-w-xs">
                                    @foreach (array_slice($portfolio->tech_stack ?? [], 0, 3) as $tech)
                                        <span class="px-2 py-0.5 bg-[#0f172a] rounded text-[10px] font-mono text-purple-300 border border-purple-500/10">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                    @if (count($portfolio->tech_stack ?? []) > 3)
                                        <span class="text-[10px] text-gray-500 font-mono pl-1">
                                            +{{ count($portfolio->tech_stack) - 3 }} more
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-right space-x-3">
                                <a href="{{ route('admin.portfolio.edit', $portfolio) }}"
                                    class="text-cyan-400 hover:text-cyan-300 font-semibold tracking-wide uppercase text-xs hover:underline">
                                    Edit
                                </a>
                                <button wire:click="deletePortfolio({{ $portfolio->id }})" wire:confirm="Are you sure you want to delete this portfolio showcase?"
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
                {{ $portfolios->links() }}
            </div>
        @else
            <div class="px-6 py-16 text-center">
                <svg class="mx-auto h-12 w-12 text-cyan-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="mt-4 text-lg font-bold text-white">No portfolio projects found</h3>
                <p class="mt-2 text-sm text-cyan-400/50 font-mono">Get started by creating a new portfolio project showcase.</p>
                <div class="mt-6">
                    <a href="{{ route('admin.portfolio.create') }}"
                        class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider text-sm">
                        Create Portfolio
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
