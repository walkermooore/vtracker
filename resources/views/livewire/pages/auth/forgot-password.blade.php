<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the user.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('status', __($status));

            return;
        }

        $this->addError('email', __($status));
    }
}; ?>

<div class="flex min-h-screen font-sans bg-slate-900">
    <div class="hidden lg:flex lg:w-1/2 bg-slate-800 relative items-center justify-center border-r border-slate-700 overflow-hidden">
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]"></div>

        <div class="relative z-10 text-center px-8">
            <div class="inline-flex items-center justify-center p-4 bg-slate-900 rounded-2xl border border-slate-700 mb-6 shadow-2xl shadow-emerald-900/20">
                <svg class="w-16 h-16 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                </svg>
            </div>
            <h1 class="text-5xl font-black text-white tracking-tight">VTRACKER</h1>
            <p class="mt-4 text-emerald-400 font-mono text-sm uppercase tracking-widest">Protocol Recovery Module</p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-slate-900 shadow-[inset_20px_0_40px_rgba(0,0,0,0.5)]">
        <div class="w-full max-w-md">

            <div class="mb-10 lg:hidden text-center">
                <h1 class="text-4xl font-black text-white tracking-tight">VTRACKER</h1>
                <p class="mt-2 text-emerald-400 font-mono text-xs uppercase tracking-widest">Recovery Mode</p>
            </div>

            <h2 class="text-2xl font-bold text-white mb-2 font-mono">Forgot Passphrase?</h2>
            <p class="text-slate-400 mb-8 font-mono text-sm leading-relaxed">
                Informe o seu ID de operador. Enviaremos um link de redefinição de protocolo para que você possa reestabelecer o acesso ao terminal.
            </p>

            <x-auth-session-status class="mb-6 p-4 bg-emerald-900/30 border border-emerald-500/50 rounded-lg text-emerald-400 text-sm font-mono" :status="session('status')" />

            <form wire:submit="sendPasswordResetLink" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-mono text-slate-300 mb-2">Operator Email</label>
                    <input wire:model="email" id="email" type="email" required autofocus
                           class="w-full px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg text-white font-mono focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all placeholder-slate-600" placeholder="admin@vtracker.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 font-mono text-xs" />
                </div>

                <div class="flex flex-col space-y-4 mt-8">
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold font-mono text-slate-900 bg-emerald-500 hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 focus:ring-offset-slate-900 transition-colors uppercase tracking-widest">
                        Send Recovery Link
                    </button>

                    <a href="{{ route('login') }}" class="text-center text-sm text-slate-400 hover:text-white font-mono transition-colors">
                        &larr; Return to Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
