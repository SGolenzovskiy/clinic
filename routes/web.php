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

Route::get('/', ['uses' => 'PageController']);
Route::get('{specialization}', ['uses' => 'PageController@view']);

Route::post('ajax-visit', ['uses' => 'VisitController@visit'])->name('ajax-visit');
