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

$this->get('panel', 'Panel\PanelController@index');
