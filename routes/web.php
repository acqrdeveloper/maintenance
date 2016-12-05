<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


//todo: implementation of CRUD for the class Product
Route::get('/', 'ProductController@index')->name('rIndexProduct');
Route::get('create', 'ProductController@create')->name('rCreateProduct');
Route::post('create', 'ProductController@store')->name('rStoreProduct');
Route::get('show/{id}','ProductController@show')->name('rShowProduct');
Route::get('edit/{id}','ProductController@edit')->name('rEditProduct');
Route::put('update/{id}','ProductController@update')->name('rUpdateProduct');
Route::delete('delete/{id}','ProductController@destroy')->name('rDeleteProduct');

//todo >> full URLS get standard
Route::get('503', function () {
    return view('errors.503');
});
Route::get('404', function () {
    return view('errors.404');
});
