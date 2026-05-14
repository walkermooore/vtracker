<x-guest-layout>
    <div class="flex min-h-screen flex-col lg:flex-row bg-gray-900">
        <!-- Left Column: Brand Area (SOC Aesthetic) -->
        <div class="hidden lg:flex lg:w-1/2 bg-gray-800 items-center justify-center relative overflow-hidden border-r border-gray-700">
            <div class="z-10 text-center">
                <div class="mb-6 flex justify-center">
                    <svg class="w-24 h-24 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h1 class="text-6xl font-black tracking-tighter text-white mb-2 font-mono">VTRACKER</h1>
                <p class="text-emerald-500 text-lg uppercase tracking-[0.2em] font-mono font-bold">Security Operations Center</p>
                
                <div class="mt-12 grid grid-cols-2 gap-4 text-left px-12">
                    <div class="border-l-2 border-emerald-500 pl-4 py-2 bg-gray-900/50">
                        <span class="block text-emerald-500 text-[10px] font-mono uppercase tracking-widest">Status</span>
                        <span class="text-white text-sm font-mono tracking-tighter">PERIMETER SECURE</span>
                    </div>
                    <div class="border-l-2 border-emerald-500 pl-4 py-2 bg-gray-900/50">
                        <span class="block text-emerald-500 text-[10px] font-mono uppercase tracking-widest">Protocol</span>
                        <span class="text-white text-sm font-mono tracking-tighter">ENCRYPTED L3</span>
                    </div>
                </div>
            </div>
            <!-- Decorative Grid Pattern -->
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#10b981 0.5px, transparent 0.5px); background-size: 30px 30px;"></div>
        </div>

        <!-- Right Column: Login Form Container -->
        <div class="flex-1 flex items-center justify-center bg-gray-900 p-8">
            <div class="w-full max-w-md">
                <div class="lg:hidden text-center mb-8">
                    <h2 class="text-4xl font-black text-emerald-500 font-mono tracking-tighter">VTRACKER</h2>
                </div>

                <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-2xl p-10">
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-white font-mono uppercase tracking-tight">System Access</h3>
                        <p class="text-gray-400 text-xs font-mono mt-1 uppercase tracking-widest">Level 1 Authentication Required</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-gray-400 font-mono text-[10px] uppercase tracking-[0.15em] mb-2 font-bold">Operator ID (Email)</label>
                            <input id="email" class="block w-full bg-gray-900 border-gray-700 text-gray-100 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none font-mono transition-all" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="admin@vtracker.io" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-gray-400 font-mono text-[10px] uppercase tracking-[0.15em] mb-2 font-bold">Access Protocol (Password)</label>
                            <input id="password" class="block w-full bg-gray-900 border-gray-700 text-gray-100 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none font-mono transition-all"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" 
                                            placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded bg-gray-900 border-gray-700 text-emerald-600 shadow-sm focus:ring-emerald-500 focus:ring-offset-gray-900" name="remember">
                                <span class="ms-2 text-[10px] font-mono text-gray-400 uppercase tracking-widest">{{ __('Maintain Session') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-[10px] font-mono text-gray-500 hover:text-emerald-500 uppercase tracking-widest transition-colors" href="{{ route('password.request') }}">
                                    {{ __('Lost Protocol?') }}
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-500 active:bg-emerald-700 text-gray-900 font-mono font-bold uppercase tracking-widest py-4 rounded-lg transition-all shadow-lg shadow-emerald-900/20">
                            Initialize Authentication
                        </button>
                    </form>
                </div>
                
                <p class="mt-8 text-center text-[10px] font-mono text-gray-600 uppercase tracking-widest">
                    Authorized Personnel Only — Unauthorized access is logged.
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
