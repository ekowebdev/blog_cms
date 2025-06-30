<?php 

use Illuminate\Support\Facades\Route;
use LivewireFilemanager\Filemanager\Http\Controllers\Files\FileController;


Route::group(['prefix' => '/'], function(){
    Route::get('{path}', [FileController::class, 'show'])
            ->middleware(['auth'])
            ->where('path', '^(?!docs$).*$')
            ->name('assets.show');
});