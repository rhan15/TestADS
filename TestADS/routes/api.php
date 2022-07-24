<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*- category -*/
Route::resource('categories', 'App\Http\Controllers\Category\CategoryController', ['except' => ['create', 'edit']]);
Route::resource('categories.products', 'App\Http\Controllers\Category\CategoryProductController', ['only' => ['index',]]);
Route::resource('categories.products.productassets', 'App\Http\Controllers\Category\CategoryProductProductassetController', ['only' => ['store']]);


/*- product -*/
Route::resource('products', 'App\Http\Controllers\Product\ProductController', ['except' => ['create', 'edit']]);
Route::resource('products.productassets', 'App\Http\Controllers\Product\ProductProductAssetController', ['except' => ['create', 'edit']]);

/*- productasset -*/
Route::resource('productassets', 'App\Http\Controllers\ProductAsset\ProductAssetController', ['except' => ['create', 'edit']]);

