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
    return view('login');
});

Route::post('/login', 'UsuariosController@store');

Route::group(['middleware' => ['verificausuario']], function () {    	
	Route::get('/panel', 'UsuariosController@panel');
	Route::get('/logout', 'UsuariosController@logout');
});


Route::get('/recover', 'UsuariosController@recoverpassword');
Route::post('/recover', 'UsuariosController@resetpassword');

