<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Title;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    #[Title('Profile')]
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('layout.profile_delete_account_title') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('layout.profile_delete_account_description') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('layout.profile_delete_account_title') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-6">

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('layout.profile_delete_account_confirmation_title') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('layout.profile_delete_account_confirmation_description') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('layout.password_title') }}" class="sr-only" />

                <x-text-input
                    wire:model="password"
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('layout.password_title') }}"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('layout.button_cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('layout.profile_delete_account_title') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
