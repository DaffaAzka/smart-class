<?php

use App\Livewire\Product\Lists;
use App\Livewire\Product\Content;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home');
Route::get('/product/{slug}', Content::class)->name('product');
Route::get('/{slug}/products', Lists::class)->name('product.lists');
