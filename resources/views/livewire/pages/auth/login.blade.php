<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;

new #[Layout('components.layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    #[Title('Login')]
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<x-mary-card class="w-full max-w-md p-8 bg-white shadow-md sm:rounded-lg">
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-base-content">
            {{ __('layout.login_form_title') }}
        </h2>
        <p class="text-sm text-base-content/60">
            {{ __('layout.login_form_description') }}
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-4">
        <x-mary-input
            label="{{ __('layout.email_title') }}"
            icon="o-envelope"
            wire:model="form.email"
            type="email"
            name="email"
            placeholder="you@example.com"
            autofocus
        />

        <x-mary-input
            label="{{ __('layout.password_title') }}"
            icon="o-lock-closed"
            wire:model="form.password"
            type="password"
            name="password"
            placeholder="••••••••"
        />

        <div class="flex justify-end">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" wire:navigate class="text-sm text-base-content/60 hover:underline">
                    {{ __('layout.forgot_password_title') }}
                </a>
            @endif
        </div>

        <div class="pt-2">
            <x-mary-button type="submit" class="w-full inline-flex items-center px-4 py-2 bg-gray-800 font-semibold text-xs text-white" spinner>
                {{ __('layout.login_title') }}
            </x-mary-button>
        </div>
    </form>
</x-mary-card>