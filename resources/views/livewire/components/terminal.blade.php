<div x-data="terminal()" x-cloak class="fixed bottom-24 right-6 z-40">

    <button @click="toggle"
        class="w-12 h-12 bg-black border border-green-500/50 rounded-lg flex items-center justify-center text-green-500 hover:bg-green-500 hover:text-black transition-all shadow-[0_0_15px_rgba(34,197,94,0.3)] group">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>

        <span
            class="absolute right-full mr-2 px-2 py-1 bg-black text-green-500 text-xs border border-green-500/30 rounded opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
            Open Terminal
        </span>
    </button>

    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-10 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-10 scale-95"
        class="absolute bottom-16 right-0 w-[350px] md:w-[500px] h-[350px] bg-black/95 border border-green-500/50 rounded-lg shadow-2xl flex flex-col overflow-hidden font-mono text-sm"
        @click.away="isOpen = false">

        <div class="bg-green-900/20 border-b border-green-500/30 p-2 flex justify-between items-center cursor-move">
            <div class="flex gap-2">
                <div class="w-3 h-3 rounded-full bg-red-500/50"></div>
                <div class="w-3 h-3 rounded-full bg-yellow-500/50"></div>
                <div class="w-3 h-3 rounded-full bg-green-500/50"></div>
            </div>
            <div class="text-green-500 text-xs">guest@tunas-digital:~</div>
            <button @click="isOpen = false" class="text-green-700 hover:text-green-400">✕</button>
        </div>

        <div x-ref="output" class="flex-1 p-4 overflow-y-auto space-y-2 text-green-400 scrollbar-hide">
            <div class="mb-4">
                <p>Welcome to Tunas OS v1.0.0</p>
                <p>Type <span class="text-white font-bold">'help'</span> to see available commands.</p>
            </div>

            <template x-for="(line, index) in history" :key="index">
                <div>
                    <div class="flex gap-2 opacity-50 text-xs">
                        <span>guest@tunas:~$</span>
                        <span x-text="line.cmd"></span>
                    </div>
                    <div class="whitespace-pre-wrap mt-1" :class="line.isError ? 'text-red-400' : 'text-green-300'"
                        x-html="line.output"></div>
                </div>
            </template>
        </div>

        <div class="p-2 bg-green-900/10 border-t border-green-500/30 flex items-center gap-2">
            <span class="text-green-500 animate-pulse">❯</span>
            <input type="text" x-model="input" @keydown.enter="execute" x-ref="cmdInput"
                class="w-full bg-transparent border-none focus:ring-0 text-green-400 placeholder-green-800"
                placeholder="Enter command..." autocomplete="off">
        </div>
    </div>

    <script>
        function terminal() {
            return {
                isOpen: false,
                input: '',
                history: [],
                commands: {
                    help: "Available commands:\n- about     : Who we are\n- services  : What we do\n- contact   : Get in touch\n- clear     : Clear screen\n- date      : Show server time\n- sudo      : Don't even try it :)",
                    about: "We are Tunas Melayu Digital. Architects of the future.",
                    services: "Web Development, Mobile Apps, UI/UX Design, Cloud Infrastructure.",
                    contact: "Email: hello@tunas.com | WA: +628123456789",
                    date: () => new Date().toString(),
                    sudo: "Permission denied: You are not root.",
                    whoami: "guest_user_" + Math.floor(Math.random() * 9999)
                },

                toggle() {
                    this.isOpen = !this.isOpen;
                    if (this.isOpen) {
                        this.$nextTick(() => this.$refs.cmdInput.focus());
                    }
                },

                execute() {
                    const cmd = this.input.trim().toLowerCase();
                    if (!cmd) return;

                    if (cmd === 'clear') {
                        this.history = [];
                    } else {
                        let output = '';
                        let isError = false;

                        if (this.commands[cmd]) {
                            output = typeof this.commands[cmd] === 'function' ?
                                this.commands[cmd]() :
                                this.commands[cmd];
                        } else {
                            output = `Command not found: ${cmd}. Type 'help' for list.`;
                            isError = true;
                        }

                        this.history.push({
                            cmd: cmd,
                            output: output,
                            isError: isError
                        });
                    }

                    this.input = '';
                    // Auto scroll to bottom
                    this.$nextTick(() => {
                        this.$refs.output.scrollTop = this.$refs.output.scrollHeight;
                    });
                }
            }
        }
    </script>
</div>
