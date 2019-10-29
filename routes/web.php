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

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get('/home/history', 'HistoryController@index')->name('/home/history');
Route::get('/home/history/{id}', 'HistoryController@single')->name('/home/history/{id}');

Route::get('/home/payment', 'PaymentController@index')->name('/home/payment');

Route::post('/home/payment', 'PaymentController@create')->name('/home/payment');
// Route::match(array('GET', 'POST'), '/home/payment', 'PaymentController@index')->name('/home/history');

Route::get('/home/payment/{number}/{email}/{tel}', 'InvoiceController@index');
Route::post('/home/payment/{number}/{email}/{tel}', 'InvoiceController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
