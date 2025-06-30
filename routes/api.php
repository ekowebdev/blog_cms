<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;

Route::middleware(['throttle'])->group(function () {
    Route::group(['prefix' => '/{locale}'], function(){
        Route::get('/posts', [PostController::class, 'index'])->name('posts');
        Route::get('/pages', [PageController::class, 'index'])->name('pages');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    });
});
