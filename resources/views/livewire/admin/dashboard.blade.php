<div>
    <div class="mb-8">
        <h2 class="text-4xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">Dashboard</h2>
        <p class="text-cyan-400/70 font-mono text-sm mt-2">Welcome to Tunas Melayu Digital Admin Panel</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Home Page Stats -->
        <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/40 p-6 hover:border-cyan-500/70 transition-all duration-300 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-cyan-400/70 text-sm font-mono">HOME PAGE SETTINGS</p>
                    <p class="text-5xl font-black text-cyan-300 mt-2">{{ $homePageCount }}</p>
                </div>
                <div class="bg-gradient-to-br from-cyan-500/30 to-blue-500/30 rounded-xl p-4 border border-cyan-500/30">
                    <svg class="w-8 h-8 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h2a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h2a1 1 0 001-1V9m-9 9l-2-1m0 0l-4-2m0 0v5a2 2 0 002 2h12a2 2 0 002-2v-5m0 0l-4 2m0 0l-2 1" />
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.pages.index') }}"
                class="inline-block mt-6 text-cyan-400 hover:text-cyan-300 text-sm font-mono hover:underline transition">
                Manage Home Page →
            </a>
        </div>

        <!-- Services Stats -->
        <div class="bg-gradient-to-br from-[#2a1f4a] to-[#0f172a] rounded-xl border border-purple-500/40 p-6 hover:border-purple-500/70 transition-all duration-300 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-400/70 text-sm font-mono">TOTAL SERVICES</p>
                    <p class="text-5xl font-black text-purple-300 mt-2">{{ $servicesCount }}</p>
                </div>
                <div class="bg-gradient-to-br from-purple-500/30 to-pink-500/30 rounded-xl p-4 border border-purple-500/30">
                    <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.services.index') }}"
                class="inline-block mt-6 text-purple-400 hover:text-purple-300 text-sm font-mono hover:underline transition">
                Manage Services →
            </a>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="bg-gradient-to-br from-[#1a2f4a] to-[#0f172a] rounded-xl border border-cyan-500/40 p-8 shadow-lg">
        <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
            <span class="w-2 h-2 bg-cyan-400 rounded-full"></span>
            Quick Actions
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('admin.pages.edit', 1) }}"
                class="p-6 bg-gradient-to-br from-cyan-500/20 to-[#0f172a] border border-cyan-500/40 rounded-lg hover:border-cyan-500/70 hover:shadow-lg transition-all duration-300 group">
                <h4 class="font-semibold text-cyan-300 group-hover:text-cyan-200">Edit Home Page</h4>
                <p class="text-sm text-gray-400 group-hover:text-gray-300 mt-1">Update hero section, metrics, and videos</p>
            </a>
            <a href="{{ route('admin.services.create') }}"
                class="p-6 bg-gradient-to-br from-purple-500/20 to-[#0f172a] border border-purple-500/40 rounded-lg hover:border-purple-500/70 hover:shadow-lg transition-all duration-300 group">
                <h4 class="font-semibold text-purple-300 group-hover:text-purple-200">Add New Service</h4>
                <p class="text-sm text-gray-400 group-hover:text-gray-300 mt-1">Create a new service for your portfolio</p>
            </a>
        </div>
    </div>
</div>
