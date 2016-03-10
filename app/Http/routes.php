<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ReportController@index');

Route::post('/crear_filtros', 'FiltrosController@index');



//Route::get('/reporting', ['uses' =>'ReportController@index', 'as' => 'Report']);
Route::get('/libro_diario', ['uses' =>'ReportController@libro_diario']);
Route::get('/libro_mayor', ['uses' =>'ReportController@libro_mayor']);
Route::get('/libro_iva_compras', ['uses' =>'ReportController@libro_iva_compras']);
Route::get('/libro_iva_ventas', ['uses' =>'ReportController@libro_iva_ventas']);
Route::get('/plan_cuenta', ['uses' =>'ReportController@plan_cuenta']);
