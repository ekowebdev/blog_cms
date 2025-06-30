<?php

use Livewire\Volt\Component;

new class extends Component
{
    public function mount()
    {
        view()->share('title', __('layout.dashboard_title_singular'));
    }
}; ?>

<x-layouts.app>
    
    <x-mary-header title="{{ __('layout.dashboard_title_singular') }}" separator />

    <div class="p-2 sm:p-4 space-y-8">
        <div class="grid lg:grid-cols-3 gap-6">
            <x-mary-card class="h-44">
                <div class="flex items-center gap-4 mb-4">
                    <div class="bg-primary/10 text-primary p-4 rounded-full">
                        <x-mary-icon name="o-document-text" class="w-10 h-10" />
                    </div>
                    <div>
                        <div class="text-sm text-base-content/60">{{ __('layout.card_posts_title') }}</div>
                        <div class="text-2xl font-bold">{{ \App\Models\Post::count() }}</div>
                    </div>
                </div>
                <div class="text-xs text-gray-400">{{ __('layout.card_posts_description') }}</div>
            </x-mary-card>

            <x-mary-card class="h-44">
                <div class="flex items-center gap-4 mb-4">
                    <div class="bg-blue-100 text-blue-600 p-4 rounded-full">
                        <x-mary-icon name="o-book-open" class="w-10 h-10" />
                    </div>
                    <div>
                        <div class="text-sm text-base-content/60">{{ __('layout.card_pages_title') }}</div>
                        <div class="text-2xl font-bold">{{ \App\Models\Page::count() }}</div>
                    </div>
                </div>
                <div class="text-xs text-gray-400">{{ __('layout.card_pages_description') }}</div>
            </x-mary-card>

            <x-mary-card class="h-44">
                <div class="flex items-center gap-4 mb-4">
                    <div class="bg-emerald-100 text-emerald-600 p-4 rounded-full">
                        <x-mary-icon name="o-tag" class="w-10 h-10" />
                    </div>
                    <div>
                        <div class="text-sm text-base-content/60">{{ __('layout.card_categories_title') }}</div>
                        <div class="text-2xl font-bold">{{ \App\Models\Category::count() }}</div>
                    </div>
                </div>
                <div class="text-xs text-gray-400">{{ __('layout.card_categories_description') }}</div>
            </x-mary-card>
        </div>
        <livewire:calendar-posts />
    </div>

</x-layouts.app>
