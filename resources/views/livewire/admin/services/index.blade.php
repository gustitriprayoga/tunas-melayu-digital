<div>
    <div class="mb-8 flex justify-between items-start">
        <div>
            <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">Services Management</h2>
            <p class="text-cyan-400/70 font-mono text-sm mt-2">Manage all your service offerings</p>
        </div>
        <a href="{{ route('admin.services.create') }}"
            class="px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider text-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Service
        </a>
    </div>

    <!-- Search -->
    <div class="mb-6">
        <input type="text" wire:model.live="search" placeholder="Search services..."
            class="w-full px-4 py-3 border border-cyan-500/40 rounded-lg bg-[#0f172a] text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all">
    </div>

    <!-- Services Table -->
    <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/40 overflow-hidden shadow-lg">
        @if ($services->count() > 0)
            <table class="w-full border-collapse">
                <thead class="bg-[#0d1420] border-b border-cyan-500/30">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Title</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Icon</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Created</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-cyan-400/70 uppercase tracking-widest font-mono">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-cyan-500/20 bg-[#0f172a]/60">
                    @foreach ($services as $service)
                        <tr class="hover:bg-cyan-500/5 transition-all">
                            <td class="px-6 py-4 text-sm text-white font-medium">
                                {{ $service->title }}
                            </td>
                            <td class="px-6 py-4 text-sm text-cyan-300 font-mono">
                                {{ $service->icon }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-semibold tracking-wider uppercase font-mono {{ $service->is_active ? 'bg-green-500/10 text-green-400 border border-green-500/20 shadow-[0_0_10px_rgba(34,197,94,0.1)]' : 'bg-gray-500/10 text-gray-400 border border-gray-500/20' }}">
                                    {{ $service->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400 font-mono">
                                {{ $service->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-right space-x-3">
                                <a href="{{ route('admin.services.edit', $service) }}"
                                    class="text-cyan-400 hover:text-cyan-300 font-semibold tracking-wide uppercase text-xs hover:underline">
                                    Edit
                                </a>
                                <button wire:click="deleteService({{ $service->id }})" wire:confirm="Are you sure?"
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
                {{ $services->links() }}
            </div>
        @else
            <div class="px-6 py-16 text-center">
                <svg class="mx-auto h-12 w-12 text-cyan-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="mt-4 text-lg font-bold text-white">No services found</h3>
                <p class="mt-2 text-sm text-cyan-400/50 font-mono">Get started by creating a new service record.</p>
                <div class="mt-6">
                    <a href="{{ route('admin.services.create') }}"
                        class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider text-sm">
                        Create Service
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
