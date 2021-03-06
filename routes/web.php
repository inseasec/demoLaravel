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

//update data

Route::get('/user/edit/{id}', 'UserController@edit');

Route::post('user/update', 'UserController@update');

//delete data


//Route::get('/user/delete/{id}', 'UserController@delete');
Route::any('user/delete/{id}', 'UserController@delete');

//products data

Route::get('fashion/products', 'UserController@products');
Route::get('fashion/getcat/{depart}', 'UserController@getcat');
Route::get('fashion/getproducts/{id}', 'UserController@getproduct');

//crud with ajax

Route::get('/user/createform', 'UserController@createForm');
Route::post('/user/insertdata', 'UserController@insertData');
Route::get('/user/showdata','UserController@showData');
Route::get('/user/editdata','UserController@editData');
Route::post('/user/updatedata','UserController@updateData');
Route::any('/user/deletedata','UserController@deleteData');
