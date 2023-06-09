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



Auth::routes();


	Route::post('do_login', array('uses' => 'HomeController@doLogin'));

	Route::post('do_logout', array('uses' => 'HomeController@doLogout'));

	Route::resource('usuario','UsuarioController');

	

Route::middleware(['web'])->group(function(){	
	Route::get('/home', 'HomeController@index')->name('home');

	// FACTURAS
	Route::post('/home/datos_factura/{id}', 'FacturaController@see');
	Route::post('/home/detalle_factura/{id}','FacturaController@detalles');
	Route::get('/home/detalle_factura/reporte/{id}','FacturaController@detalleReporte');
	Route::get('/home/crear/factura', 'FacturaController@formFactura');
	Route::post('/home/crear/carga_factura/{id}', 'FacturaController@cargaFactura');
	Route::post('/home/crear/ver_precio/{id}', 'FacturaController@cargaPrecios');
	Route::post('/home/crear/save_factura','FacturaController@saveFactura');
	Route::resource('/home/factura', 'FacturaController');

	// Empresa
	Route::resource('/home/empresa', 'EmpresaController');

	// ARTICULOS
	Route::get('/home/producto/edit', 'ProductoController@edit')->name('EditProducto');
	Route::get('/home/producto/agregar', 'ProductoController@Agregar');
	Route::get('/home/producto/list/{id}', 'ProductoController@list');
	Route::get('/home/producto/ver', 'ProductoController@viewList');
	Route::get('/home/producto/{id}/active', 'ProductoController@active')->name('ActiveProducto');
	Route::resource('/home/producto', 'ProductoController');

	// DETALLE ARTICULO
	Route::get('/home/detalle/precio/{id}/{anio}/{mes}', 'DetalleProductoController@ProdInv');
	Route::get('/home/detalle/precio/delete/{id}', 'DetalleProductoController@delete');
	Route::resource('/home/detalle/precio', 'DetalleProductoController');

	// INVENTARIO
	Route::get('/home/inventario/contar/{anio}', 'InventarioController@contar');
	Route::get('/home/inventario/PDF/{id}', 'InventarioController@PDF');
	Route::get('/home/ver/inventario', 'InventarioController@verInventario');
	Route::get('/home/inventario/all/{anio}', 'InventarioController@All');
	Route::get('/home/inventario/create', 'InventarioController@create');
	Route::get('/home/inventario/finalizar/{id}', 'InventarioController@FinalizarInventario');
	Route::resource('/home/inventario', 'InventarioController');

	// DETALLE INVENTARIO

	Route::get('/home/detalle/inventario/ver/activo', 'DetalleInventarioController@VerInventarioActivo');
	Route::get('/home/detalle/inventario/{id}/ver/mas/{prod}', 'DetalleInventarioController@showDetalleProducto');
	Route::post('/home/detalle/inventario/editar/cantidad', 'DetalleInventarioController@EditCantidad');
	Route::resource('/home/detalle/inventario', 'DetalleInventarioController');


	// INVENTARIO SUCURSAL

	Route::post('/home/inv_sucursal/{id}', 'SucursalController@verNumero');
	Route::post('/home/sucursal/carga/{id}', 'SucursalController@listaTodo');
	Route::post('/home/sucursal/detalle/{id}/{suc}', 'SucursalController@verDetalleInventario');
	Route::post('/home/detalle/{id}/{suc}', 'SucursalController@verDetalleInventario');
	Route::get('/home/sucursal/ver', 'SucursalController@listaInventarios');
	Route::post('/home/inv_sucursal/save/{id}', 'SucursalController@saveInventarioSuc');
	Route::post('/home/inv_sucursal/listar/{id}', 'SucursalController@listarActivos');
	Route::post('/home/sucursal/de_baja/{id}', 'SucursalController@cerrarInventario');
	Route::post('/home/de_baja/{id}', 'SucursalController@cerrarInventario');
	Route::resource('/home/inv_sucursal','SucursalController');


	// DETALLE INV. SUCURSAL
	Route::post('/home/det_inv_sucursal/{ad}', 'DetalleInvSucursalController@verInventarioActivo');
	Route::post('/home/carga_detalle/{id}', 'DetalleInvSucursalController@cargarDetalle');
	Route::post('/home/det_inv_sucursal/ver_precio/{id}', 'DetalleInvSucursalController@cargaPrecios');
	Route::post('/home/save_productos', 'DetalleInvSucursalController@saveProductos');
	Route::resource('/home/det_inv_sucursal','DetalleInvSucursalController');

});