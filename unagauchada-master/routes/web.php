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
Route::put('/gauchada/{gauchada}', 'GauchadaController@update')->name('update_gauchada_path');
Route::get('/gauchada/index/publico', 'GauchadaController@indexpublico')->name('indexpublico_gauchada_path');
Route::get('/gauchada', 'GauchadaController@index')->name('gauchadas_path');
Route::get('/gauchada/{gauchada}', 'GauchadaController@show')->name('gauchada_path');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/perfil', 'UserController@index')->name('perfil_index_path');
Route::get('/perfil/edit', 'UserController@edit')->name('edit_perfil_path');
Route::put('/perfil/{user_id}', 'UserController@update')->name('update_perfil_path');


Route::get('usuario/searchredirect', function(){
     
    // Nuevo: si el argumento search está vacío regresar a la página anterior
    // if (empty(Input::get('search'))) return redirect()->back();
    
    $search = urlencode(e(Input::get('search')));
    $route = "/usuario/$search";
    return redirect($route);
}); 
Route::get("/usuario/{search}", "UserController@search");