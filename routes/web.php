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
    return view('index');
});

Route::get('/contract', function(){
    return view('contract');
});

Route::get('/property',  function(){
    return view('property');
});

Route::get('/landlord',  function(){
    return view('landlord');
});


Route::get('/reports/due',  function(){
    return view('reports.due');
});

Route::get('/reports/own',  function(){
    return view('reports.own');
});

