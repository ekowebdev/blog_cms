<!DOCTYPE html>
<html data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'Dashboard' }} | Blog App</title>

        {{-- EasyMDE --}}
        <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
        <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css','resources/js/app.js'])

        @filemanagerStyles
    </head>
    <body class="min-h-screen font-sans antialiased bg-base-200">
        <x-mary-nav sticky full-width>
    
            <x-slot:brand>
                <label for="main-drawer" class="lg:hidden mr-3">
                    <x-mary-icon name="o-bars-3" class="cursor-pointer" />
                </label>
    
                <x-application-logo class="w-12 h-12 fill-current text-gray-500" />
            </x-slot:brand>
    
            <x-slot:actions>
                <livewire:language-switcher />
            </x-slot:actions>

        </x-mary-nav>

        <x-mary-main with-nav full-width>
    
            <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-200">
                @if($user = auth()->user())
                    <x-mary-list-item
                        :item="$user"
                        no-separator
                        no-hover
                        class="pt-2"
                    >
                        <x-slot:value>
                            {{ $user->name }}
                        </x-slot:value>
                        <x-slot:sub-value>
                            @if (in_array('admin', $user->getRoleNames()->toArray()))
                                <x-mary-badge value="{{ $user->getRoleNames()->first() }}" class="badge-success badge-soft" />
                            @else
                                <x-mary-badge value="{{ $user->getRoleNames()->first() }}" class="badge-primary badge-soft" />
                            @endif
                        </x-slot:sub-value>
                        <x-slot:actions>
                            <x-mary-dropdown>
                                <x-slot:trigger>
                                    <x-mary-button icon="o-cog-6-tooth" class="btn-circle" />
                                </x-slot:trigger>
                            
                                <x-mary-menu-item icon="o-users" title="{{ __('layout.profile_title_singular') }}" link="{{ route('profile') }}" />
                                <livewire:logout-button />
                            </x-mary-dropdown>
                        </x-slot:actions>
                    </x-mary-list-item>
                    <x-mary-menu-separator />
                @endif
    
                <x-mary-menu activate-by-route>
                    <x-mary-menu-item title="{{ __('layout.dashboard_title_plural') }}" icon="o-home" link="{{ route('dashboard') }}" />
                    <x-mary-menu-item title="{{ __('layout.posts_title_plural') }}" icon="o-document-text" link="{{ route('posts') }}" />
                    <x-mary-menu-item title="{{ __('layout.pages_title_plural') }}" icon="o-book-open" link="{{ route('pages') }}" />
                    <x-mary-menu-item title="{{ __('layout.categories_title_plural') }}" icon="o-tag" link="{{ route('categories') }}" />
                    @can('view media')
                        <x-mary-menu-item title="{{ __('layout.media_manager_title_plural') }}" icon="o-folder" link="{{ route('media.manager') }}" />
                    @endcan
                </x-mary-menu>
            </x-slot:sidebar>
    
            <x-slot:content>
                {{ $slot }}
            </x-slot:content>
            
        </x-mary-main>
    
        <x-mary-toast />

    @filemanagerScripts
    </body>
</html>
