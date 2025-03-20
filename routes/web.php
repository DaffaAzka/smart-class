<?php

use App\Livewire\Product\Lists;
use App\Livewire\Product\Content;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home');
Route::get('/product/{slug}', Content::class)->name('product');
Route::get('/{slug}/products', Lists::class)->name('product.lists');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::middleware(['set.bearer.token', 'auth:api'])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [App\Http\Controllers\PageController::class, 'dashboard'])->name('dashboard');
    Route::get('categories', function () {
        return view('admin.category');
    })->name('categories');

    Route::get('products', function () {
        return view('admin.product');
    })->name('products');

    Route::get('/{slug}/contents', function ($slug) {
        return view('admin.content', ['slug' => $slug]);
    })->name('product.content');

    Route::get('messages', function () {
        return view('admin.messages');
    })->name('messages');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');


});

// Authentication
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.post');
