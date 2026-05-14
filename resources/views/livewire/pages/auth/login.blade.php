<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex min-h-screen font-sans bg-slate-900">
    <div class="hidden lg:flex lg:w-1/2 bg-slate-800 relative items-center justify-center border-r border-slate-700 overflow-hidden">
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]"></div>

        <div class="relative z-10 text-center px-8">
            <div class="inline-flex items-center justify-center p-4 bg-slate-900 rounded-2xl border border-slate-700 mb-6 shadow-2xl shadow-emerald-900/20">
                <svg class="w-16 h-16 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
            </div>
            <h1 class="text-5xl font-black text-white tracking-tight">VTRACKER</h1>
            <p class="mt-4 text-emerald-400 font-mono text-sm uppercase tracking-widest">Threat Intelligence & SecOps</p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-slate-900 shadow-[inset_20px_0_40px_rgba(0,0,0,0.5)]">
        <div class="w-full max-w-md">

            <div class="mb-10 lg:hidden text-center">
                <h1 class="text-4xl font-black text-white tracking-tight">VTRACKER</h1>
                <p class="mt-2 text-emerald-400 font-mono text-xs uppercase tracking-widest">SecOps Panel</p>
            </div>

            <h2 class="text-2xl font-bold text-white mb-2 font-mono">Authentication Required</h2>
            <p class="text-slate-400 mb-8 font-mono text-sm">Enter your credentials to access the SOC terminal.</p>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form wire:submit="login" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-mono text-slate-300 mb-2">Operator ID / Email</label>
                    <input wire:model="form.email" id="email" type="email" required autofocus autocomplete="username"
                           class="w-full px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg text-white font-mono focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all placeholder-slate-600" placeholder="sysadmin@empresa.com">
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2 text-red-400 font-mono text-xs" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-mono text-slate-300 mb-2">Passphrase</label>
                    <input wire:model="form.password" id="password" type="password" required autocomplete="current-password"
                           class="w-full px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg text-white font-mono focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all placeholder-slate-600" placeholder="••••••••••••">
                    <x-input-error :messages="$errors->get('form.password')" class="mt-2 text-red-400 font-mono text-xs" />
                </div>

                <div class="flex items-center justify-between">
                    <label for="remember" class="inline-flex items-center cursor-pointer">
                        <input wire:model="form.remember" id="remember" type="checkbox" class="rounded bg-slate-800 border-slate-700 text-emerald-500 shadow-sm focus:ring-emerald-500 focus:ring-offset-slate-900">
                        <span class="ms-2 text-sm text-slate-400 font-mono">Keep session alive</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-emerald-500 hover:text-emerald-400 font-mono transition-colors" href="{{ route('password.request') }}" wire:navigate>
                            Forgot protocol?
                        </a>
                    @endif
                </div>

                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold font-mono text-slate-900 bg-emerald-500 hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 focus:ring-offset-slate-900 transition-colors uppercase tracking-widest mt-4">
                    Initialize Session
                </button>
            </form>
        </div>
    </div>
</div>
