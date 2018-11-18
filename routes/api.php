<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/landlord', 'LandlordController')->except(['create', 'edit']);
Route::resource('/property', 'PropertyController')->except(['create', 'edit','update']);
Route::resource('/contract', 'ContractsController')->except(['create', 'edit']);
Route::get('/reports/due', 'ReportsController@dueRentProperties')->name('reports.due');
Route::get('/reports/own', 'ReportsController@ownProperties')->name('reports.own');
