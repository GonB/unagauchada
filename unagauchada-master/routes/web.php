<?php

use Illuminate\Support\Facades\input;
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
Route::get('/gauchada/create', 'GauchadaController@create')->name('create_gauchada_path');
Route::post('/gauchada/', 'GauchadaController@store')->name('store_gauchada_path');
Route::get('/gauchada/{gauchada}/edit', 'GauchadaController@edit')->name('edit_gauchada_path');
Route::delete('/gauchada/{gauchada}/delete', 'GauchadaController@delete')->name('delete_gauchada_path');
Route::put('/gauchada/up/{gauchada}', 'GauchadaController@update')->name('update_gauchada_path');
Route::get('/gauchada/index/publico', 'GauchadaController@indexpublico')->name('indexpublico_gauchada_path');
Route::get('/gauchada', 'GauchadaController@index')->name('gauchadas_path');
Route::get('/gauchada/{gauchada}', 'GauchadaController@show')->name('gauchada_path');
Route::get('/gauchada/search', 'GauchadaController@search')->name('buscar_gauchada_path');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/perfil', 'UserController@index')->name('perfil_index_path');
Route::get('/perfil/edit', 'UserController@edit')->name('edit_perfil_path');
Route::put('/perfil/{user_id}', 'UserController@update')->name('update_perfil_path');

Route::get('/perfil/search', 'UserController@search')->name('buscar_perfil_path');

Route::get('/pago', 'PagoController@create')->name('create_pago_path');
Route::post('/pago', 'PagoController@store')->name('store_pago_path');
Route::get('/pago/update', 'UserController@update_creditos')->name('update_creditos_path');

