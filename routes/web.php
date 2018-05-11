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

Route::get('/', 'TicketController@index')->middleware('auth');

Auth::routes();
Route::get('/verify/{token}', 'VerifyController@verify')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tickets', 'TicketController@index')->middleware('auth');
Route::post('/tickets', 'TicketController@store')->middleware('permission:create ticket');
Route::get('/tickets/create', 'TicketController@create')->middleware('auth');
Route::get('/tickets/{ticket}', 'TicketController@show')->middleware('auth');
Route::put('/tickets/{ticket}', 'TicketController@update')->middleware('permission:edit ticket');
Route::delete('/tickets/{ticket}', 'TicketController@destroy')->middleware('permission:delete ticket');
Route::get('/tickets/{ticket}/edit', 'TicketController@edit')->middleware('auth');
