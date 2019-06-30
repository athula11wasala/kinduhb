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

Route::get('/', 'StudentController@index');
Route::get('/show', 'StudentController@show');
Route::post('/create', 'StudentController@create');
Route::post('/delete', 'StudentController@destory');
Route::post('/update', 'StudentController@update');




