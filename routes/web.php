<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/search',  'search')->name('products.search'); // Search for products
    Route::get('/', 'index')->name('products.index'); // List of all products
    Route::get('/create', 'create')->name('products.create'); // Show the form to create a new product
    Route::post('/', 'store')->name('products.store'); // Store a new product
    Route::get('/{id}', 'show')->name('products.show'); // Show a specific product
    Route::get('/{id}/edit', 'edit')->name('products.edit'); // Show the form to edit a product
    Route::put('/{id}', 'update')->name('products.update'); // Update a product
    Route::delete('/{id}', 'destroy')->name('products.destroy'); // Delete a product
});






