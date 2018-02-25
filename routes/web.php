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

<<<<<<< HEAD
Route::get('/admin/products', function(){
	return view('data_products');
});

=======
//Route::get('/home', 'ArticulosController@index')->name('articulos');
>>>>>>> a8db79ad120fe41f8dac67256902268ee962cb27

Route::get('/home/articulos', function()
{
    return view('articulos');
});
