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


Route::get('/', 'IndexController@bienvenido');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/admin', 'Admin\AdminController@tablero')->name('Mantenimiento');

Route::get('profile', 'UserController@profile');

Route::post('profile', 'UserController@update_avatar');
//PROFESIONES
Route::get('servicios', 'Admin\ServiciosController@index')->name('servicios');
Route::post('servicios', 'Admin\ServiciosController@store')->name('serviciosSave');
Route::get('servicios/{id}/edit', 'Admin\ServiciosController@edit')->name('serviciosFormUpdate');
Route::delete('servicios/{id}', 'Admin\ServiciosController@destroy');
//SERVICIOS
Route::get('profesiones', 'Admin\ProfesionesController@index')->name('profesiones');
Route::post('profesiones', 'Admin\ProfesionesController@store')->name('profesionesSave');
Route::get('profesiones/{id}/edit', 'Admin\ProfesionesController@edit')->name('profesionesFormUpdate');
//rouas para el crud de ciudades
Route::resource('ciudades', 'Admin\CiudadesController');
Route::resource('barrios', 'Admin\BarriosController');
Route::resource('registro', 'PersonasController');

Route::get('getBarrio/{id}/', 'PersonasController@getBarrio')->name('getBarrio');

Route::resource('perfilProfesional', 'PerfilprofesionalController');

Route::get('getProfesion/{id}/', 'PerfilprofesionalController@getProfesion')->name('getProfesion');


//login from google
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');


Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


Route::get('formacion', 'FormacionController@index')->name('getFormacion');
Route::post('formacion', 'FormacionController@store')->name('saveFormacion');



Route::get('myhj', 'HojaVidaController@index')->name('hj');