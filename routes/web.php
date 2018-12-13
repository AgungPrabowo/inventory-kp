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
Route::get('/categorie/printCategories', 'CategorieController@printPDF');

Route::get('/supplier', 'SupplierController@index')->name('supplier');
Route::post('/supplier', 'SupplierController@store');
Route::post('/supplier/update/{id}', 'SupplierController@update');
Route::post('/supplier/destroy/{id}', 'SupplierController@destroy');
Route::get('/supplier/printSuppliers', 'SupplierController@printPDF');

Route::get('/product', 'ProductController@index')->name('product');
Route::post('/product', 'ProductController@store');
Route::post('/product/update/{id}', 'ProductController@update');
Route::post('/product/destroy/{id}', 'ProductController@destroy');
Route::get('/product/printProducts', 'ProductController@printPDF');

Route::get('/purchase', 'PurchasesController@index')->name('purchase');
Route::post('/purchase', 'PurchasesController@store');
Route::post('/purchase/destroy/{id}', 'PurchasesController@destroy');
Route::post('/purchase/printPurchases', 'PurchasesController@printPDF')->name('purchasePDF');

Route::get('/order', 'OrderController@index')->name('order');
Route::post('/order', 'OrderController@store');
Route::post('/order/destroy/{id}', 'OrderController@destroy');
Route::post('/order/printOrder', 'OrderController@printPDF')->name('orderPDF');