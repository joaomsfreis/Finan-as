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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/filter', 'HomeController@filter')->name('filter');

Route::get('/chart', 'HomeController@chart')->name('chart');

Route::resource('/users', 'UserController');


Route::resource('/transactions', 'TransactionController');
