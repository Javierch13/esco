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

Auth::routes();

//Route::get('/home', 'CoursesController@index')->name('home');
//Route::get('/','CoursesController@index');

// Rutas de operadores 
Route::get('/operadores/index', 'OperadorController@index');
Route::get('/operador/create', 'OperadorController@create');
Route::post('/operador', 'OperadorController@store')->name('create_operador');
Route::get('/operadores/operador/{operador}/edit', 'OperadorController@edit');
Route::put('/operador/{operador}', 'OperadorController@update');
Route::delete('/operadores/operador/{operador}', 'OperadorController@destroy');


// Rutas de tipos 
Route::get('/tipos/index', 'TipoController@index');
Route::get('/tipo/create', 'TipoController@create');
Route::post('/tipo', 'TipoController@store')->name('create_tipo');
Route::get('/tipos/tipo/{tipo}/edit', 'TipoController@edit');
Route::put('/tipo/{tipo}', 'TipoController@update');
Route::delete('/tipos/tipo/{tipo}', 'TipoController@destroy');

// Rutas de orden trabajo 
Route::get('/ordenes/index', 'OrdenController@index');
Route::get('/orden/create', 'OrdenController@create');
Route::post('/orden', 'OrdenController@store')->name('create_orden');
Route::get('/ordenes/orden/{orden}/edit', 'OrdenController@edit');
Route::put('/orden/{orden}', 'OrdenController@update');
Route::delete('/ordenes/orden/{orden}', 'OrdenController@destroy');
