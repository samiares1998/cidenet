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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/empleados', 'EmpleadosController@empleados')->name('empleados');



Route::get('/generar/{nombre}/{apellido}/{pais}', 'EmpleadosController@generar')->name('generar');
Route::get('/delete/{id}', 'EmpleadosController@delete')->name('delete');

Route::post('/add_empleado', 'EmpleadosController@add')->name('add_empleado');
Route::post('/edit_empleado/{id}', 'EmpleadosController@edit')->name('edit_empleado');

Route::get('/logout', function () {
    Auth::guard('')->logout();
    return view('auth.login');
});