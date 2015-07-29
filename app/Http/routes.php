<?php

/* CMS */
Route::get('cms/dashboard', 'DashboardController@index');
Route::resource('cms/products', 'ProductsController');
Route::resource('cms/menu', 'MenuController');
Route::resource('cms/contents', 'ContentsController');
Route::resource('cms/categories', 'CategoriesController');
Route::resource('cms/users', 'UsersController');
Route::get('cms/orders/{id}/edit', 'OrdersController@edit');
Route::patch('cms/orders/{id}', 'OrdersController@update');
Route::get('cms/orders', 'OrdersController@index');

/* Shop */
Route::get('shop/{cat}/{item}', 'ShopController@item');
Route::get('shop/{cat}', 'ShopController@products');
Route::get('shop', 'ShopController@index');

/* Cart */
Route::get('cart/addToCart', 'CartController@addToCart');
Route::get('cart/checkout', 'CartController@checkout');
Route::get('cart/order', 'CartController@order');
Route::get('cart/update', 'CartController@update');

/* User */
Route::get('user/login', 'UserController@login');
Route::get('user/register', 'UserController@register');
Route::get('user/logout', 'UserController@logout');
Route::post('user/loginUser','UserController@loginUser');
Route::post('user/registerUser','UserController@registerUser');

/* Pages */
Route::get('/', 'PagesController@index');
Route::get('orderInfo','PagesController@orderInfo');
Route::get('{page}', 'PagesController@boot');
