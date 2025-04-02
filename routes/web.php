<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('posts', PostController::class);
Route::resource('videos', VideoController::class);
Route::post('postsStore/{id}', [CommentController::class, 'postsStore'])->name('postsStore');
Route::post('videosStore/{id}', [CommentController::class, 'videosStore'])->name('videosStore');
Route::post('commentDestroy/{id}', [CommentController::class, 'commentDestroy'])->name('commentDestroy');
