<?php

use App\Livewire\PageIndex;
use App\Livewire\PostIndex;
use App\Livewire\MediaManager;
use App\Livewire\CategoryIndex;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Route;
use LivewireFilemanager\Filemanager\Http\Controllers\Files\FileController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('posts', PostIndex::class)
    ->middleware(['auth'])
    ->name('posts');

Route::get('pages', PageIndex::class)
    ->middleware(['auth'])
    ->name('pages');

Route::get('categories', CategoryIndex::class)
    ->middleware(['auth'])
    ->name('categories');

Route::get('media-manager', MediaManager::class)->middleware(['auth'])->name('media.manager');

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';