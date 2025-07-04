<?php

use Illuminate\Support\Str;
use Livewire\Volt\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

new #[Layout('components.layouts.guest')] class extends Component
{
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    #[Title('Reset Password')]
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        Session::flash('status', __($status));

        $this->redirectRoute('login', navigate: true);
    }
}; ?>

<div class="max-w-lg mx-auto mt-10 p-6 bg-base-100 rounded-xl shadow">
    <x-mary-header title="Reset Password" />

    <form wire:submit.prevent="resetPassword" class="space-y-4 mt-6">
        {{-- Email --}}
        <x-mary-input
            label="Email"
            type="email"
            wire:model.defer="email"
            name="email"
            required
            autocomplete="username"
            :error="$errors->first('email')"
        />

        {{-- Password --}}
        <x-mary-input
            label="Password"
            type="password"
            wire:model.defer="password"
            name="password"
            required
            autocomplete="new-password"
            :error="$errors->first('password')"
        />

        {{-- Confirm Password --}}
        <x-mary-input
            label="Confirm Password"
            type="password"
            wire:model.defer="password_confirmation"
            name="password_confirmation"
            required
            autocomplete="new-password"
            :error="$errors->first('password_confirmation')"
        />

        {{-- Submit Button --}}
        <div class="text-end pt-4">
            <x-mary-button class="btn-primary" type="submit" spinner>
                {{ __('Reset Password') }}
            </x-mary-button>
        </div>
    </form>
</div>
