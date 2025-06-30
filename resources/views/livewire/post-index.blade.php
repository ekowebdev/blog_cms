<div>  
    <x-mary-header title="{{ __('layout.posts_title_plural') }}" separator>
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
        @can('create posts')
        <x-slot:actions>
            <x-mary-button icon="o-plus" class="inline-flex items-center px-4 py-2 bg-gray-800 font-semibold text-xs text-white" spinner @click="$wire.showModal()" />
        </x-slot:actions>
        @endcan
    </x-mary-header>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @can('view posts')
            <x-mary-table :headers="$headers" :rows="$posts" striped bordered with-pagination per-page="perPage" :per-page-values="[3, 5, 10]">
                @foreach ($posts as $index => $post)
                    @scope('cell_no', $post)
                        {{ $post->id }}
                    @endscope

                    @scope('cell_title', $post)
                        {{ $post->title }}
                    @endscope

                    @scope('cell_short_description', $post)
                        {{ $post->short_description }}
                    @endscope

                    @scope('cell_categories', $post)
                        <div class="flex flex-wrap gap-1">
                            @foreach ($post->categories as $category)
                                <x-mary-badge value="{{ $category->name }}" class="badge-primary badge-soft" />
                            @endforeach
                        </div>
                    @endscope

                    @scope('cell_status', $post)
                        @if ($post->status === 'draft')
                            <x-mary-badge value="Draft" class="badge badge-soft" />
                        @elseif ($post->status === 'published')
                            <x-mary-badge value="Published" class="badge-success badge-soft" />
                        @else
                            <x-mary-badge value="Unknown" class="badge-neutral" />
                        @endif
                    @endscope

                    @scope('actions', $post)
                        @can('delete posts')
                        <x-mary-button
                            type="button"
                            icon="o-trash"
                            wire:click="delete({{ $post->id }})"
                            spinner
                            class="btn btn-sm btn-ghost text-error m-2"
                        />
                        @endcan

                        @can('edit posts')
                        <x-mary-button
                            type="button"
                            icon="o-pencil-square"
                            wire:click="edit({{ $post->id }})"
                            class="btn btn-sm btn-ghost m-2"
                        />
                        @endcan
                    @endscope
                @endforeach
            </x-mary-table>
            @endcan
            <x-form-modal
                model="postModal"
                submit="save"
            >
                <x-slot:title>
                    {{ $isEditMode ? __('layout.post_modal_title_edit') : __('layout.post_modal_title_create') }}
                </x-slot:title>
                <x-slot:submit-label>
                    {{ $isEditMode ? __('layout.button_update') : __('layout.button_save') }}
                </x-slot:submit-label>
                <x-mary-input label="{{ __('layout.title_form') }}" wire:model="form.title" />
                <x-mary-textarea label="{{ __('layout.short_description_form') }}" wire:model="form.short_description" rows="3" />
                <x-mary-markdown label="{{ __('layout.content_form') }}" wire:model="form.content" folder="images/posts/content" />
                <x-mary-select label="{{ __('layout.categories_form') }}" :options="$categories" wire:model="form.selectedCategories" multiple class="h-24" />
                @if ($isEditMode && $form->image && is_string($form->image))
                    <div class="mb-2 w-240 h-160">
                        <img src="{{ asset('storage/' . $form->image) }}" alt="Current Image" class="w-32 rounded border" />
                    </div>
                @endif
                <x-mary-file wire:model.defer="form.image" label="{{ $isEditMode ? __('layout.upload_image_new_form') : __('layout.upload_image_form') }}" />
                <x-mary-radio label="{{ __('layout.status_form') }}" wire:model="form.status" :options="$status" inline />
            </x-form-modal>

        </div>
    </div>
</div>