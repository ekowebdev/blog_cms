<div> 
    @can('view media')
    <x-mary-header title="{{ __('layout.media_manager_title_plural') }}" />
    <x-livewire-filemanager />
    @endcan
</div>