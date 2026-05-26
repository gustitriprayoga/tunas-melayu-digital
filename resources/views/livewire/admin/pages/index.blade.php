<div>
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">Home Page Management</h2>
            <p class="text-cyan-400/70 font-mono text-sm mt-2">Manage your website's home page content</p>
        </div>
        <a href="{{ route('admin.pages.edit', 1) }}"
            class="px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider text-sm flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit Page
        </a>
    </div>

    <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/40 p-8 shadow-lg">
        <div class="border-b border-cyan-500/30 pb-6 mb-6">
            <h3 class="text-xl font-bold text-cyan-300 flex items-center gap-2">
                <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
                Current Configuration
            </h3>
            <p class="text-cyan-400/70 text-xs font-mono mt-1">Live data rendered on the public landing page</p>
        </div>

        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest font-mono">Main Title (Glitch)</h4>
                    <div class="bg-[#0d1420] border border-cyan-500/20 rounded-lg p-4 text-white font-medium">
                        {{ $page->hero_title }}
                    </div>
                </div>
                <div>
                    <h4 class="text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest font-mono">Button Text</h4>
                    <div class="bg-[#0d1420] border border-cyan-500/20 rounded-lg p-4 text-white font-medium">
                        {{ $page->cta_text }}
                    </div>
                </div>
                <div class="md:col-span-2">
                    <h4 class="text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest font-mono">Subtitle Narrative</h4>
                    <div class="bg-[#0d1420] border border-cyan-500/20 rounded-lg p-4 text-gray-300">
                        {{ $page->hero_subtitle }}
                    </div>
                </div>
                <div>
                    <h4 class="text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest font-mono">Button Link</h4>
                    <div class="bg-[#0d1420] border border-cyan-500/20 rounded-lg p-4 font-mono text-cyan-300 break-all">
                        {{ $page->cta_link ?? 'Not set' }}
                    </div>
                </div>
                <div>
                    <h4 class="text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest font-mono">Video URL</h4>
                    <div class="bg-[#0d1420] border border-cyan-500/20 rounded-lg p-4 font-mono text-cyan-300 break-all">
                        {{ $page->video_url ?? 'Not set' }}
                    </div>
                </div>
                <div class="md:col-span-2">
                    <h4 class="text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest font-mono">Real-time Metrics</h4>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-[#0d1420] border border-cyan-500/20 rounded-lg p-4 text-center">
                            <span class="text-2xl font-black text-cyan-300 block">{{ $page->stats_clients }}</span>
                            <span class="text-[10px] text-cyan-400/50 uppercase tracking-wider font-mono">Happy Clients</span>
                        </div>
                        <div class="bg-[#0d1420] border border-cyan-500/20 rounded-lg p-4 text-center">
                            <span class="text-2xl font-black text-purple-300 block">{{ $page->stats_projects }}</span>
                            <span class="text-[10px] text-purple-400/50 uppercase tracking-wider font-mono">Projects Done</span>
                        </div>
                        <div class="bg-[#0d1420] border border-cyan-500/20 rounded-lg p-4 text-center">
                            <span class="text-2xl font-black text-blue-300 block">{{ $page->stats_years }}</span>
                            <span class="text-[10px] text-blue-400/50 uppercase tracking-wider font-mono">Years Experience</span>
                        </div>
                    </div>
                </div>
            </div>

            @if ($page->getFirstMedia('hero'))
                <div class="border-t border-cyan-500/10 pt-6">
                    <h4 class="text-xs font-semibold text-cyan-400/70 mb-3 uppercase tracking-widest font-mono">Hero Background/Side Image</h4>
                    <div class="border border-cyan-500/30 p-2 rounded-xl bg-[#0d1420] inline-block">
                        <img src="{{ $page->getFirstMedia('hero')->original_url }}" alt="Hero Image"
                            class="h-48 rounded-lg object-cover border border-cyan-500/10 max-w-full">
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
