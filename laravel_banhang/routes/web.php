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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index','App\Http\Controllers\PageController@getIndex')->name('trangchu');

Route::get('loai-san-pham/{type}','App\Http\Controllers\PageController@getLoaiSp');

Route::get('chi-tiet-san-pham/{id}','App\Http\Controllers\PageController@getChiTietSp');

Route::get('lien-he','App\Http\Controllers\PageController@getLienHe');

Route::get('about','App\Http\Controllers\PageController@about');

Route::get('get-to-cart/{id}','App\Http\Controllers\PageController@getAddToCart')->name('themgiohang');

Route::get('del-cart/{id}','App\Http\Controllers\PageController@getDelItemCart')->name('xoagiohang');

Route::get('dat-hang','App\Http\Controllers\PageController@getCheckOut');