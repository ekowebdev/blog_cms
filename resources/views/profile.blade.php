@section('title', 'Profile')

<x-layouts.app>

    <x-mary-header title="{{ __('layout.profile_title_singular') }}" separator />

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <livewire:profile.update-profile-information-form />
        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <livewire:profile.update-password-form />
        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <livewire:profile.delete-user-form />
        </div>
    </div>
    
</x-layouts.app>
