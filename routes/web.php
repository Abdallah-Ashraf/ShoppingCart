<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',"HomeController@index");
Route::get("/category/items/{id}","HomeController@categoryItems");
Route::get("/brand/items/{id}","HomeController@BrandItems");
Route::get("/items/search/{id}","HomeController@searchItems");
Route::get("/items/search/prices/{pricefrom}/{priceto}","HomeController@searchItemsByPrices");
Route::post("/orders/add","HomeController@addOrder");