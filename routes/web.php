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
    return redirect('home');
});

Auth::routes();

Route::get('login/local', 'Auth\LoginController@local')->name('login-local');
Route::get('auth', 'Auth\LoginController@redirectToProvider');
Route::get('auth/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('register', function () { return redirect('home'); });
Route::post('register', function () { return redirect('home'); });

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



Route::group(['middleware' => 'auth'], function () {

	Route::resource('caracterizacion', 'Caracterizacion\CaracterizacionController')->names([
    	'index' => 'caracterizacion',
    	'create' => 'caracterizacion.create',
    	'show' => 'caracterizacion.show',
    	'edit' => 'caracterizacion.edit',
    	'update' => 'caracterizacion.update',
		'destroy' => 'caracterizacion.destroy',
	]);

	Route::post('nuevo/usuario', 'UserController@storeUser')->name('createuser')->middleware('auth');


  Route::get('importar/caracterizacion', 'Caracterizacion\CaracterizacionController@importar')->middleware('administrador')->name('caracterizacion.importar');
	Route::post('importar/caracterizacion', 'Caracterizacion\CaracterizacionController@importarCrear')->middleware('administrador')->name('caracterizacion.importarCrear');


	Route::get('exportar/usuario', 'Caracterizacion\CaracterizacionController@To.do')->middleware('auth')->name('user.export');


  Route::resource('correo', 'CorreoController')->names([
      'index' => 'correo',
      'update' => 'correo.update',
  ])->middleware('administrador');

  Route::resource('reporte', 'Reporte\ReporteController')->names([
	'index' => 'reporte',
	'create' => 'reporte.create',
	'show' => 'reporte.show',
	'edit' => 'reporte.edit',
	'update' => 'reporte.update',
	'destroy' => 'reporte.destroy',
]);

  Route::get('admin/profile', 'UserController@admin')->name('user.admin')->middleware('administrador');
  Route::get('caracterizacion/{id}/crear', 'userController@createCaracterizacion')->name('caracterizacion.ucreate');

});
Route::get('busqueda/caracterizacion', 'Caracterizacion\CaracterizacionController@busqueda')->name('buscarCaracterizacion');
Route::get('busqueda/usuario', 'UserController@busqueda')->name('buscarUsuario');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
