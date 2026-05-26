<div class="bg-gradient-to-br from-[#1a2f4a]/60 to-[#0f172a]/80 rounded-2xl backdrop-blur-xl border border-cyan-500/20 shadow-[0_0_60px_rgba(6,182,212,0.2)] p-8 w-full max-w-md">
    <div class="mb-8 text-center">
        <div class="flex justify-center mb-4">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-cyan-500 to-purple-600 flex items-center justify-center text-white font-bold text-xl">T</div>
        </div>
        <h1 class="text-3xl font-black text-white bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">TUNAS ADMIN</h1>
        <p class="text-cyan-400/70 font-mono text-xs mt-2 tracking-widest">SYSTEM ACCESS</p>
    </div>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-500/10 border border-red-500/30 rounded-lg backdrop-blur-sm">
            @foreach ($errors->all() as $error)
                <p class="text-red-400 text-sm font-mono">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form wire:submit.prevent="login" class="space-y-4">
        <div>
            <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Email Address</label>
            <input type="email" wire:model="email" required
                class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent backdrop-blur-sm transition-all"
                placeholder="admin@example.com">
            @error('email')
                <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-xs font-semibold text-cyan-400/70 mb-2 uppercase tracking-widest">Password</label>
            <input type="password" wire:model="password" required
                class="w-full px-4 py-3 border border-cyan-500/30 rounded-lg bg-[#0f172a]/50 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent backdrop-blur-sm transition-all"
                placeholder="••••••••">
            @error('password')
                <p class="text-red-400 text-xs mt-1 font-mono">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center pt-2">
            <input type="checkbox" wire:model="remember" id="remember"
                class="w-4 h-4 rounded border-cyan-500/50 bg-[#0f172a] text-cyan-500 focus:ring-cyan-500">
            <label for="remember" class="ml-2 text-sm text-gray-400">Remember me</label>
        </div>

        <button type="submit"
            class="w-full px-4 py-3 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:shadow-[0_0_20px_rgba(6,182,212,0.5)] transition-all duration-300 font-semibold uppercase tracking-wider mt-6">
            Access System
        </button>
    </form>

    <p class="text-center text-xs text-gray-500 mt-6">
        Kembali ke <a href="/"
            class="text-cyan-400 hover:text-cyan-300 font-mono underline transition">website utama</a>
    </p>
</div>
