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

Route::get('/','HomeController@index');
 
// Autenticación
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' => 'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

//Recuperar contraseña via mail
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Empresas
Route::resource('empresas','EmpresasController');
Route::get('empresadel/{id}/{nombre}', 'EmpresasController@destroy')->name('empresadel');

//clientes
Route::resource('clientes','ClientesController');
Route::get('clientedel/{id}', 'ClientesController@destroy')->name('clientedel');

//tarifas
Route::resource('tarifas','TarifasController');
Route::get('tarifadel/{id}', 'TarifasController@destroy')->name('tarifadel');
  
//servicios
Route::resource('servicios','ServiciosController');
Route::get('serviciodel/{id}', 'ServiciosController@destroy')->name('serviciodel');

//tipo vehiculos
Route::resource('tipovehiculos','TipoVehiculosController');
Route::get('tipovehiculodel/{id}', 'TipoVehiculosController@destroy')->name('tipovehiculodel');

//Convenios
Route::resource('convenios','ConveniosController');
Route::get('conveniodel/{id}', 'ConveniosController@destroy')->name('conveniodel');
Route::get('convenio_clientes/{id}/{empresa}', 'ConveniosController@convenio_clientes')->name('convenio_clientes');

//Cortesias 
Route::resource('cortesias','CortesiasController');
Route::get('cortesiadel/{id}/{name}', 'CortesiasController@destroy')->name('cortesiadel');

//Facturas
Route::resource('facturas','FacturasController');
Route::get('facturadel/{id}', 'FacturasController@destroy')->name('facturadel');
Route::get('facturanew/{id}', 'FacturasController@facturanew')->name('facturanew');

//Tickets
Route::resource('tickets','TicketsController');
Route::get('ticketsdel/{id}/{name}', 'TicketsController@destroy')->name('ticketsdel');;
 
//Cajas
Route::resource('cajas','CajasController');
Route::get('cajadel/{id}', 'CajasController@destroy')->name('cajadel');

//reportes
Route::resource('reportes','ReportesController');

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

Route::get('tic',function(){ return view('tickets.imprint');});