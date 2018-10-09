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


Route::resource('/','HomeController@index');
Route::resource('admin','adminController');
Route::post('admin/restore/{id}','adminController@restore');
Route::get('department/{id}','depController@index');
Route::post('/department/{id}','depController@store');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


