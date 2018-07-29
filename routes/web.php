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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categorie', 'CategorieController@index')->name('categorie');
Route::post('/categorie', 'CategorieController@store');
Route::post('/categorie/update/{id}', 'CategorieController@update');
Route::post('/categorie/destroy/{id}', 'CategorieController@destroy');

Route::get('/supplier', 'SupplierController@index')->name('supplier');
Route::post('/supplier', 'SupplierController@store');
Route::post('/supplier/update/{id}', 'SupplierController@update');
Route::post('/supplier/destroy/{id}', 'SupplierController@destroy');

Route::get('/product', 'ProductController@index')->name('product');
Route::post('/product', 'ProductController@store');
Route::post('/product/update/{id}', 'ProductController@update');
Route::post('/product/destroy/{id}', 'ProductController@destroy');