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
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function(){
    Route::group(array('prefix' => 'Articulos'), function(){
        Route::get('/', 'ArticulosController@index')->name('Articulos.index');
        Route::get('/create', 'ArticulosController@create')->name('Articulos.create');
        Route::post('/store', 'ArticulosController@store')->name('Articulos.store');
        Route::delete('/delete/{id}', 'ArticulosController@destroy')->name('Articulos.delete');
        Route::get('/filtro/{id}', 'ArticulosController@filtrar')->name('Articulos.filtro');
        Route::get('/edit/{id}', 'ArticulosController@edit')->name('Articulos.edit');
        Route::post('/update/{id}', 'ArticulosController@update')->name('Articulos.update');
    });

    Route::group(array('prefix' => 'ArticulosFamilia'), function(){
        Route::get('/', 'ArticulosFamiliaController@index')->name('ArticulosFamilia.index');
        Route::post('/store', 'ArticulosFamiliaController@store')->name('ArticulosFamilia.store');
    });

    Route::group(array('prefix' => 'Imagen'), function(){
        Route::get('/{idArticulo}', 'ImagenController@index')->name('Imagen.index');
        Route::post('/{idArticulo}', 'ImagenController@store')->name('Imagen.store');
        Route::delete('/delete/{id}', 'ImagenController@destroy')->name('Imagen.delete');
    });
    
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


