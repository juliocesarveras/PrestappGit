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

use App\Cliente;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
   		Route::get('/','ClientesController@index');
		Route::resource('clientes','ClientesController');
		Route::resource('pais','PaisesController');
		Route::resource('nacionalidad','NacionalidadController');
		Route::resource('ciudad','CiudadesController');
Route::get('prestamo/{id}', ['as' => 'prestamo.create', 'uses' => 'PrestamosController@create']);//para poder recibir el id en el create() 
Route::resource('prestamo','PrestamosController',['except'=>['create']]);

Route::resource('formaPago','FormaPagosController');
Route::resource('tipoPrestamo','TipoPrestamosController');
Route::resource('reportePago','ReportePagosController');
Route::resource('pago','PagosController');
Route::post('abono/{id}','AbonoController@show');
Route::resource('abono','AbonoController');

});

