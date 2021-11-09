<?php

use App\Http\Controllers\AppController;
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

Route::get('/home', 'App\Http\Controllers\AppController@home');
Route::post('/home','App\Http\Controllers\AppController@add');
Route::get('/cart', 'App\Http\Controllers\AppController@cart');
Route::post('/cart','App\Http\Controllers\AppController@update');
Route::get('/cart/delete','App\Http\Controllers\AppController@delete');
Route::get('/back','App\Http\Controllers\AppController@back');
    