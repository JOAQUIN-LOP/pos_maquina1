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
Route::get('/home/crear/factura', 'FacturaController@formFactura');
Route::resource('/home/factura', 'FacturaController');

// Empresa
Route::resource('/home/empresa', 'EmpresaController');

// ARTICULOS
Route::get('/home/producto/edit', 'ProductoController@edit')->name('EditProducto');
Route::get('/home/producto/{id}/active', 'ProductoController@active')->name('ActiveProducto');
Route::resource('/home/producto', 'ProductoController');

// DETALLE ARTICULO
Route::get('/home/detalle/precio/{id}/{anio}/{mes}', 'DetalleProductoController@ProdInv');
Route::get('/home/detalle/precio/delete/{id}', 'DetalleProductoController@delete');
Route::resource('/home/detalle/precio', 'DetalleProductoController');

// INVENTARIO
Route::get('/home/inventario/contar/{anio}', 'InventarioController@contar');
Route::get('/home/inventario/all/{anio}', 'InventarioController@All');
Route::get('/home/inventario/create', 'InventarioController@create');
Route::get('/home/inventario/finalizar/{id}', 'InventarioController@FinalizarInventario');
Route::resource('/home/inventario', 'InventarioController');

// DETALLE INVENTARIO

Route::get('/home/detalle/inventario/ver/activo', 'DetalleInventarioController@VerInventarioActivo');
Route::get('/home/detalle/inventario/{id}/ver/mas/{prod}', 'DetalleInventarioController@showDetalleProducto');
Route::resource('/home/detalle/inventario', 'DetalleInventarioController');

