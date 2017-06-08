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
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/gauchada/index', 'GauchadaController@index')-> name('index_gauchada_path');
Route::get('/gauchada/create', 'GauchadaController@create')->name('create_gauchada_path');
Route::post('/gauchada/', 'GauchadaController@store')->name('store_gauchada_path');
Route::get('/gauchada/edit', 'GauchadaController@edit')->name('edit_gauchada_path');
Route::get('/gauchada/delete', 'GauchadaController@delete')->name('delete_gauchada_path');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
