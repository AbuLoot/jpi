<?php

Auth::routes();
Route::get('path-dir', 'InputController@pathDir');

// Joystick Administration
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'Joystick\AdminController@index');

    Route::resource('categories', 'Joystick\CategoryController');
    Route::resource('countries', 'Joystick\CountryController');
    Route::resource('companies', 'Joystick\CompanyController');
    Route::resource('cities', 'Joystick\CityController');
    Route::resource('news', 'Joystick\NewController');
    Route::resource('languages', 'Joystick\LanguageController');
    Route::resource('options', 'Joystick\OptionController');
    Route::resource('orders', 'Joystick\OrderController');
    Route::resource('pages', 'Joystick\PageController');
    Route::resource('section', 'Joystick\SectionController');
    Route::resource('products', 'Joystick\ProductController');
    Route::resource('slide', 'Joystick\SlideController');

    Route::get('products-search', 'Joystick\ProductController@search');
    Route::get('products-category/{id}', 'Joystick\ProductController@categoryProducts');
    Route::get('products-actions', 'Joystick\ProductController@actionProducts');

    Route::resource('roles', 'Joystick\RoleController');
    Route::resource('users', 'Joystick\UserController');
    Route::resource('permissions', 'Joystick\PermissionController');

    Route::get('apps', 'Joystick\AppController@index');
    Route::get('apps/{id}', 'Joystick\AppController@show');
    Route::delete('apps/{id}', 'Joystick\AppController@destroy');
});


Route::get('/', 'MainController@index');

// Input
Route::get('search', 'InputController@search');
Route::get('search-ajax', 'InputController@searchAjax');
Route::post('filter-products', 'InputController@filterProducts');
Route::post('send-app', 'InputController@sendApp');


// Order and Payment
Route::get('cart/{id}', 'InputController@addToCart');
Route::get('clear-cart', 'InputController@clearCart');
Route::get('basket', 'InputController@basket');
Route::get('basket/{id}', 'InputController@destroy');
Route::post('store-order', 'InputController@storeOrder');
Route::get('payment', 'InputController@payment');
Route::get('postlink', 'InputController@postlink');


// Pages
Route::get('catalog', 'MainController@catalog');
Route::get('catalog/{category}', 'MainController@categoryProducts');
Route::get('catalog/brand/{company}', 'MainController@brandProducts');
Route::get('catalog/{category}/{product}', 'MainController@product');
Route::get('news', 'MainController@news');
Route::get('news/{page}', 'MainController@newsPage');
Route::post('send-app', 'MainController@sendApp');
Route::get('contacts', 'MainController@contacts');
Route::get('{page}', 'MainController@page');
