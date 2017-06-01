<?php

Auth::routes();

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
    Route::resource('products', 'Joystick\ProductController');

    Route::resource('roles', 'Joystick\RoleController');
    Route::resource('users', 'Joystick\UserController');
    Route::resource('permissions', 'Joystick\PermissionController');

    Route::get('apps', 'Joystick\AppController@index');
    Route::get('apps/{id}', 'Joystick\AppController@show');
    Route::delete('apps/{id}', 'Joystick\AppController@destroy');
});


Route::get('/', 'MainController@index');

Route::get('search', 'InputController@search');

Route::get('cart/{id}', 'InputController@addToCart');

Route::get('clear-cart', 'InputController@clearCart');

Route::get('basket', 'InputController@basket');

Route::get('basket/{id}', 'InputController@destroy');

// Order and Payment

Route::post('store-order', 'InputController@storeOrder');

Route::get('payment', 'EpayController@payment');

Route::get('postlink', 'EpayController@postlink');


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
