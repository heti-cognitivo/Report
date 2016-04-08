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

Route::get('/showfilters', 'DiscoveryController@discover_fields_jasper');
Route::get('/getfilterdata','DiscoveryController@get_discovery_data');
Route::get('/showreport','ReportController@show');
Route::get('/discoverfields','DiscoveryController@discover_fields_query');
Route::get('/testdiscovery',function(){return View::make('discovery.testdiscovery');});
