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
});

Route::resource('/landlord', 'LandlordController')->except(['create', 'edit']);
Route::resource('/property/landlords', 'PropertyLandlordController')->only(['index', 'store','show','update']);
Route::resource('/property', 'PropertyController')->except(['create', 'edit']);
Route::resource('/contract', 'ContractsController')->except(['create', 'edit']);
