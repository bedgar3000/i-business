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

Route::get('/', 'Auth\LoginController@index')->middleware('guest');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::get('home','HomeController@index')->name('home');
    Route::get('rh', function () {
        return view('rh.dashboard');
    });

    Route::get('cb', function () {
        return view('cb.dashboard');
    });

    ##  Sistema
    Route::get('si', function () {
        return view('layouts.si');
    });

    Route::get('si/dashboard', function () {
        return view('si.dashboard');
    });

    #Aplicacion
    Route::get('si/aplicaciones/list', 'SI\AplicacionController@list');
    Route::post('si/aplicaciones/destroyMass', 'SI\AplicacionController@destroyMass');
    Route::resource('si/aplicaciones', 'SI\AplicacionController');
    #Parametro
    Route::get('si/parametros/list', 'SI\ParametroController@list');
    Route::post('si/parametros/destroyMass', 'SI\ParametroController@destroyMass');
    Route::resource('si/parametros', 'SI\ParametroController');
    #Moneda
    Route::get('si/monedas/list', 'SI\MonedaController@list');
    Route::post('si/monedas/destroyMass', 'SI\MonedaController@destroyMass');
    Route::resource('si/monedas', 'SI\MonedaController');
    #Tipo de Cambio Diario
    Route::get('si/tipo_cambio/list', 'SI\TipoCambioController@list');
    Route::post('si/tipo_cambio/destroyMass', 'SI\TipoCambioController@destroyMass');
    Route::resource('si/tipo_cambio', 'SI\TipoCambioController');
    #Misceláneos
    Route::get('si/miscelaneos/list', 'SI\MiscelaneoController@list');
    Route::post('si/miscelaneos/destroyMass', 'SI\MiscelaneoController@destroyMass');
    Route::resource('si/miscelaneos', 'SI\MiscelaneoController');
    #Paises
    Route::get('si/paises/list', 'SI\PaisController@list');
    Route::post('si/paises/destroyMass', 'SI\PaisController@destroyMass');
    Route::post('si/paises/estados', 'SI\PaisController@estados');
    Route::resource('si/paises', 'SI\PaisController');
    #Estados
    Route::get('si/estados/list', 'SI\EstadoController@list');
    Route::post('si/estados/destroyMass', 'SI\EstadoController@destroyMass');
    Route::resource('si/estados', 'SI\EstadoController');
    #Tipo de Departamentos/Municipios
    Route::get('si/municipios/list', 'SI\MunicipioController@list');
    Route::post('si/municipios/destroyMass', 'SI\MunicipioController@destroyMass');
    Route::resource('si/municipios', 'SI\MunicipioController');
    #Ciudades
    Route::get('si/ciudades/list','SI\CiudadController@list');
    Route::post('si/ciudades/destroyMass','SI\CiudadController@destroyMass');
    Route::resource('si/ciudades','SI\CiudadController');
    
    #Usuario
    Route::resource('si/usuarios', 'SI\UsuarioController');
});
