<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Password;

new #[Layout('components.layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    #[Title('Forgot Password')]
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<x-mary-card class="w-full max-w-md p-8 bg-white shadow-md sm:rounded-lg">
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-base-content">
            {{ __('layout.forgot_password_form_title') }}
        </h2>
        <p class="text-sm text-base-content/60">
            {{ __('layout.forgot_password_form_description') }}
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit.prevent="sendPasswordResetLink" class="space-y-4">
        <x-mary-input
            label="{{ __('layout.email_title') }}"
            icon="o-envelope"
            wire:model="email"
            type="email"
            name="email"
            placeholder="you@example.com"
            autofocus
        />

        <div class="text-end">
            <x-mary-button class="inline-flex items-center px-4 py-2 bg-gray-800 font-semibold text-xs text-white" type="submit" spinner>
                {{ __('layout.forgot_password_form_button') }}
            </x-mary-button>
        </div>
    </form>
</x-mary-card>

