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

Route::resource('/', "GameController");
Route::get('/play', "GameEngineController@start");
Route::post('/play', "GameEngineController@gameEngine");
Route::get('/test/{id}', "GameEngineController@test");
