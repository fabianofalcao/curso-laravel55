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
$this->get('promocoes', 'Site\SiteController@promotions')->name('promotions');

$this->group(['prefix' => 'panel', 'namespace' => 'Panel'], function (){
    $this->get('/', 'PanelController@index')->name('panel');

    $this->any('marcas/pesquisa', 'BrandController@search')->name('marcas.search');
    $this->get('marcas/{id}/avioes', 'BrandController@planes')->name('marcas.avioes');
    $this->resource('marcas', 'BrandController');

    $this->get('estados', 'StateController@index')->name('estados.index');
    $this->any('estados/pesquisa', 'StateController@search')->name('estados.search');
    $this->post('estados/{initials}/cidades/search', 'CityController@search')->name('estados.cities.search');
    $this->get('estados/{initials}/cidades', 'CityController@index')->name('estado.cidades');

    $this->any('avioes/pesquisa', 'PlaneController@search')->name('avioes.search');
    $this->resource('avioes', 'PlaneController');
});


Auth::routes();
