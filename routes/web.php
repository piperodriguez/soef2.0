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

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/admin', 'Admin\AdminController@tablero')->name('Mantenimiento');

Route::get('profile', 'UserController@profile');

Route::post('profile', 'UserController@update_avatar');

Route::get('servicios', 'Admin\ServiciosController@index')->name('servicios');