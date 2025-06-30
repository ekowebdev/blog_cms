<x-mary-dropdown icon="o-language" label="{{ strtoupper(app()->getLocale()) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 font-semibold text-xs text-white">
    <x-mary-menu-item wire:click="switchLang('en')" title="English" />
    <x-mary-menu-item wire:click="switchLang('id')" title="Bahasa Indonesia" />
</x-mary-dropdown>
