<?php

use App\Models\User;
use Livewire\Volt\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

new #[Layout('components.layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    #[Title('Register')]
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);
        $user->assignRole('viewer');

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>


<x-mary-card class="w-full max-w-md p-8 bg-white shadow-md sm:rounded-lg">
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-base-content">
            {{ __('layout.register_form_title') }}
        </h2>
        <p class="text-sm text-base-content/60">
            {{ __('layout.register_form_description') }}
        </p>
    </div>
    <form wire:submit.prevent="register" class="space-y-4">
        <x-mary-input
            label="{{ __('layout.name_title') }}"
            icon="o-users"
            wire:model.defer="name"
            id="name"
            name="name"
            autofocus
            autocomplete="name"
            placeholder="John Doe"
            :error="$errors->first('name')"
        />

        <x-mary-input
            label="{{ __('layout.email_title') }}"
            type="email"
            icon="o-envelope"
            wire:model.defer="email"
            id="email"
            name="email"
            autocomplete="username"
            placeholder="you@example.com"
            :error="$errors->first('email')"
        />

        <x-mary-input
            label="{{ __('layout.password_title') }}"
            type="password"
            icon="o-lock-closed"
            wire:model.defer="password"
            id="password"
            name="password"
            autocomplete="new-password"
            placeholder="••••••••"
            :error="$errors->first('password')"
        />

        <x-mary-input
            label="{{ __('layout.password_confirmation_title') }}"
            type="password"
            icon="o-lock-closed"
            wire:model.defer="password_confirmation"
            id="password_confirmation"
            name="password_confirmation"
            autocomplete="new-password"
            placeholder="••••••••"
            :error="$errors->first('password_confirmation')"
        />

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('login') }}" wire:navigate class="text-sm text-base-content/60 hover:underline">
                {{ __('layout.already_registered_title') }}
            </a>

            <x-mary-button class="inline-flex items-center px-4 py-2 bg-gray-800 font-semibold text-xs text-white" type="submit" spinner>
                {{ __('layout.register_title') }}
            </x-mary-button>
        </div>
    </form>
</x-mary-card>