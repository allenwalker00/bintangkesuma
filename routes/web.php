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

Route::get('blank', function () {
    return view('layout');
});


Route::get('departemen/{id?}', ['uses' => 'master\DepartemenController@link', 'as' => 'departemen-link']);
Route::get('departemen-data', ['uses' => 'master\DepartemenController@data', 'as' => 'departemen-data']);
Route::post('departemen-simpan', ['uses' => 'master\DepartemenController@simpan', 'as' => 'departemen-simpan']);
Route::post('departemen-hapus', ['uses' => 'master\DepartemenController@hapus', 'as' => 'departemen-hapus']);

