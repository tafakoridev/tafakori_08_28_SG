<?php

use Core\Route;

Route::post('/api/products', 'ProductsController@store');
Route::post('/api/products/update', 'ProductsController@update');
Route::delete('/api/products/{id}', 'ProductsController@delete');
// routes for ShoppingCartController
Route::get('/api/shoppingcart', 'ShoppingCartController@index'); // Display shopping cart
Route::post('/api/cart/add/{id}', 'ShoppingCartController@addToCart'); // Add a product to the cart
Route::delete('/api/cart/remove/{id}', 'ShoppingCartController@removeFromCart'); // Remove a product from the cart
Route::post('/api/cart/checkout', 'ShoppingCartController@checkout'); // Checkout the cart
