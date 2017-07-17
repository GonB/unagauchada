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


// Rutas gauchada
Route::get('/gauchada/create', 'GauchadaController@create')->name('create_gauchada_path');
Route::post('/gauchada', 'GauchadaController@store')->name('store_gauchada_path');
Route::get('/gauchada/{gauchada}/edit', 'GauchadaController@edit')->name('edit_gauchada_path');
Route::get('/gauchada/{gauchada}/delete', 'GauchadaController@delete')->name('delete_gauchada_path');
Route::get('/gauchada/up/{gauchada}', 'GauchadaController@update')->name('update_gauchada_path');
Route::get('/gauchada/index/publico', 'GauchadaController@indexpublico')->name('indexpublico_gauchada_path');
Route::get('/gauchada/index', 'GauchadaController@index')->name('gauchadas_path');
Route::get('/gauchada/{gauchada}', 'GauchadaController@show')->name('gauchada_path');
Route::get('/gauchada', 'GauchadaController@search')->name('buscar_gauchada_path');
Route::get('/gauchada/index/{gauchada}', 'GauchadaController@despostular')->name('despostular_gauchada_path');


// Rutas perfil
Route::get('/perfil', 'UserController@index')->name('perfil_index_path')->middleware('auth');
Route::get('/perfil/edit', 'UserController@edit')->name('edit_perfil_path');
Route::get('/perfil/{user_id}', 'UserController@update')->name('update_perfil_path');
Route::get('/perfil/search', 'UserController@search')->name('buscar_perfil_path');
Route::get('/perfil/{user}/ver', 'UserController@ver')->name('ver_perfil_path');


//Rutas pago
Route::get('/pago/create', 'PagoController@create')->name('create_pago_path')->middleware('auth');
Route::get('/pago', 'PagoController@store')->name('store_pago_path');
Route::put('/pago/update/{pago}', 'UserController@update_creditos')->name('update_creditos_path');


//Rutas Postula
Route::get('/postular/{gauchada}', 'PostulaController@store')->name('store_postula_path');
Route::get('/despostular/{gauchada}', 'PostulaController@destroy')->name('destroy_postula_path');
Route::get('/elegido/{postula}/{gauchada}', 'PostulaController@choose')->name('choose_postula_path');
Route::get('/postulaciones', 'PostulaController@misPostulaciones')->name('mis_postulaciones_path');


//Rutas Comentario
Route::get('/comentar/create/{gauchada}', 'ComentarioController@create')->name('create_comentario_path');
Route::get('/comentar/{gauchada}', 'ComentarioController@store')->name('store_comentario_path');	


//Rutas Respuesta


Route::get('/respuesta/create/{comentario}', 'RespuestaController@create')->name('create_respuesta_path');
Route::get('/respuesta/{comentario}', 'RespuestaController@store')->name('store_respuesta_path');

// al momento de puntuar, modifica al usuario
Route::get('/elegido/Sum/{user_pointSum}/{gauchada}', 'UserController@pointSum')->name('pointSum_perfil_path');
Route::get('/elegido/Null/{user_pointNull}/{gauchada}', 'UserController@pointNull')->name('pointNull_perfil_path');
Route::get('/elegido/Res/{user_pointRes}/{gauchada}', 'UserController@pointRes')->name('pointRes_perfil_path');

//ADMIN
Route::get('/admin', 'AdminController@index')->name('index_admin_path');

//Rutas Categoria Gauchada
Route::get('/categoriagauchada/create', 'CategoriaGauchadaController@create')->name('create_categoriagauchada_path');
Route::get('/categoriagauchada', 'CategoriaGauchadaController@store')->name('store_categoriagauchada_path');

//Rutas Categoria Usuario
Route::get('/categoriausuario/create', 'CategoriaUsuarioController@create')->name('create_categoriausuario_path');
Route::get('/categoriausuario', 'CategoriaUsuarioController@store')->name('store_categoriausuario_path');
Route::get('/categoriausuario/index', 'CategoriaUsuarioController@index')->name('index_categoriausuario_path');