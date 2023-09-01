<?php

use core\Route;

Route::get('/', 'ProductsController@index');
Route::get('/products/{id}', 'ProductsController@show');
Route::get('/products/create/new', 'ProductsController@create');
Route::get('/products', 'ProductsController@index');
Route::get('/products/update/{id}', 'ProductsController@edit');