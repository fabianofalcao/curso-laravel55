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

$this->get('/', 'Site\SiteController@index');
$this->post('pesquisar', 'Site\SiteController@serach')->name('search.flights.site');
$this->get('promocoes', 'Site\SiteController@promotions')->name('promotions');

$this->group(['prefix' => 'panel', 'namespace' => 'Panel'], function (){
    $this->get('/', 'PanelController@index')->name('panel');

    $this->any('marcas/pesquisa', 'BrandController@search')->name('marcas.search');
    $this->get('marcas/{id}/avioes', 'BrandController@planes')->name('marcas.avioes');
    $this->resource('marcas', 'BrandController');

    $this->get('estados', 'StateController@index')->name('estados.index');
    $this->any('estados/pesquisa', 'StateController@search')->name('estados.search');
    $this->any('estados/{initials}/cidades/search', 'CityController@search')->name('estados.cities.search');
    $this->get('estados/{initials}/cidades', 'CityController@index')->name('estado.cidades');

    $this->any('avioes/pesquisa', 'PlaneController@search')->name('avioes.search');
    $this->resource('avioes', 'PlaneController');

    $this->resource('voos', 'FlightController');
    $this->any('voos/pesquisa', 'FlightController@search')->name('voos.search');

    $this->any('cidades/{id}/aeroportos/search', 'AirportController@search')->name('aeroportos.search');   
    $this->resource('cidades/{id}/aeroportos', 'AirportController');

    $this->resource('usuarios', 'UserController');
    $this->any('usuarios/pesquisa', 'UserController@search')->name('usuarios.search');

    $this->resource('reservas', 'ReserveController',[
        'except' => ['show', 'destroy']
    ]);
    $this->any('reservas/pesquisa', 'ReserveController@search')->name('reservas.search');
});


Auth::routes();
