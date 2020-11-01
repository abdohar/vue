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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/setdata','DataController@store');
Route::get('/getdata','DataController@index');
Route::post('/deleteiteme/{id}','DataController@destroy');
Route::post('/edititeme/{id}','DataController@update');

Route::get('/pdf','DataController@generate_pdf');