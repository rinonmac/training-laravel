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

Route::get('/','PenggunaController@index');
Route::post('/','PenggunaController@store')->name('.');
Route::post('/{pengguna}','PenggunaController@destroy');
Route::get('/{pengguna}/edit','PenggunaController@edit');
Route::patch('/{pengguna}','PenggunaController@update');
