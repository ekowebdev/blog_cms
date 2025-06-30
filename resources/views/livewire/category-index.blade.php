<div>  
    <x-mary-header title="{{ __('layout.categories_title_plural') }}" separator>
        <x-slot:middle class="!justify-end">
            <div class="relative w-full">
                <x-mary-input
                    icon="o-magnifying-glass"
                    wire:model.live.debounce="search"
                    placeholder="{{ __('layout.search_title_form') }}"
                    class="pr-12"
                />

                @if ($search)
                    <button
                        type="button"
                        x-on:click="$wire.set('search', '', true)"
                        class="absolute right-3 top-1/2 -translate-y-1/2 z-10 text-gray-400 hover:text-red-500 focus:outline-none"
                    >
                        <svg
                            class="w-5 h-5 pointer-events-none"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                @endif
            </div>
        </x-slot:middle>
        @can('create categories')
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="inline-flex items-center px-4 py-2 bg-gray-800 font-semibold text-xs text-white" spinner @click="$wire.showModal()" />
        </x-slot:actions>
        @endcan
    </x-mary-header>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @can('view categories')
            <x-mary-table :headers="$headers" :rows="$categories" striped bordered with-pagination per-page="perPage" :per-page-values="[3, 5, 10]">
                @foreach ($categories as $index => $category)
                    @scope('cell_no', $category)
                        {{ $category->id }}
                    @endscope

                    @scope('cell_title', $category)
                        {{ $category->name }}
                    @endscope

                    @scope('actions', $category)
                        @can('delete categories')
                        <x-mary-button
                            type="button"
                            icon="o-trash"
                            wire:click="delete({{ $category->id }})"
                            spinner
                            class="btn btn-sm btn-ghost text-error m-2"
                        />
                        @endcan

                        @can('edit categories')
                        <x-mary-button
                            type="button"
                            icon="o-pencil-square"
                            wire:click="edit({{ $category->id }})"
                            class="btn btn-sm btn-ghost m-2"
                        />
                        @endcan

                    @endscope
                @endforeach
            </x-mary-table>
            @endcan

            <x-form-modal
                model="categoryModal"
                submit="save"
            >
                <x-slot:title>
                    {{ $isEditMode ? __('layout.category_modal_title_edit') : __('layout.category_modal_title_create') }}
                </x-slot:title>
                <x-slot:submit-label>
                    {{ $isEditMode ? __('layout.button_update') : __('layout.button_save') }}
                </x-slot:submit-label>
                <x-mary-input label="{{ __('layout.name_form') }}" wire:model="form.name" />
            </x-form-modal>

        </div>
    </div>
</div>