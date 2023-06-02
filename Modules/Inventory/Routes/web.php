<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('inventory')->group(function () {
    // Route::get('/', 'InventoryController@index');
    Route::view('/products', 'inventory::livewire.product.index')->name('products');
    Route::view('/categories', 'inventory::livewire.category.index')->name('categories');
});
