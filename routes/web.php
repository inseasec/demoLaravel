<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/user/create','UserController@create');

Route::post('/user/insert', 'UserController@insert');


//read data

Route::get('/user/show','UserController@show');

// //update data

Route::get('/user/edit/{id}', 'UserController@edit');

Route::post('user/update', 'UserController@update');


Route::get('/user/delete/{id}', 'UserController@delete');

// Route::get('/user/deleterecord/{id}', 'UserController@deleteRecord');

Route::get('delete', 'UserController@delete')->name('delete');

