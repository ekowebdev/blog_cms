<x-mary-modal :wire:model="$attributes->get('model')" :title="$title">
    <x-mary-form :wire:submit="$submit" no-separator>
        {{ $slot }}

        <x-slot:actions>
            <x-mary-button label="{{ __('layout.button_cancel') }}" @click="$wire.set('{{ $attributes->get('model') }}', false)" />
            <x-mary-button
                :label="$submitLabel ?? __('layout.button_save')"
                class="inline-flex items-center px-4 py-2 bg-gray-800 font-semibold text-white"
                spinner
                :wire:target="$submit"
                type="submit"
            />
        </x-slot:actions>
    </x-mary-form>
</x-mary-modal>