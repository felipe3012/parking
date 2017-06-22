<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('home', 'HomeController@index');
 
// Autenticación
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' => 'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

//Recuperar contraseña via mail
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Usuarios
Route::resource('usuarios','UsuariosController');
Route::get('usuariodel/{id}', 'UsuariosController@destroy')->name('usuariodel');
Route::get('usuarioactive/{id}', 'UsuariosController@active')->name('usuarioactive');
Route::get('change', 'UsuariosController@cambiar')->name('change');
Route::post('cambiar', 'UsuariosController@change')->name('cambiar');
Route::post('usuario/perfil', 'UsuariosController@image')->name('usuario/perfil');

//Perfiles
Route::resource('perfiles','PerfilesController');
Route::get('perfil/{id}/{name}','PerfilesController@destroy')->name('perfil');

//funcionalidades
Route::resource('funcionalidades','FuncionalidadesController');
Route::get('funcionalidad/{id}/{name}','FuncionalidadesController@destroy')->name('funcionalidad');

//configuración
Route::resource('configuraciones','ConfiguracionesController');

//validations remote
Route::get('/path/to/remote/validator/{id}', 'UsuariosController@valid');
Route::get('/path/to/remote/email/{id}', 'UsuariosController@unique');

//email 

//administrador
