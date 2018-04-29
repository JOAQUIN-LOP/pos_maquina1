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
    return view('vendor/adminlte/login');
});

Route::post('do_login', array('uses' => 'HomeController@doLogin'));

Route::post('do_logout', array('uses' => 'HomeController@doLogout'));

Auth::routes();

Route::resource('usuario','UsuarioController');

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/home/datos_factura/{id}', 'FacturaController@see');
Route::post('/home/detalle_factura/{id}','FacturaController@detalles');
Route::resource('/home/factura', 'FacturaController');


// ARTICULOS
Route::get('/home/producto/edit', 'ProductoController@edit')->name('EditProducto');
Route::get('/home/producto/{id}/active', 'ProductoController@active')->name('ActiveProducto');
Route::resource('/home/producto', 'ProductoController');
Route::resource('/home/detalle/precio', 'DetalleProductoController');

// INVENTARIO
Route::resource('/home/inventario', 'InventarioController');
Route::get('/home/inventario/create', 'InventarioController@index')->name('crear');


