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

Route::get('/', 'TicketController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tickets', 'TicketController@index');
Route::post('/tickets', 'TicketController@store')->middleware('permission:create ticket');
Route::get('/tickets/create', 'TicketController@create');
Route::get('/tickets/{ticket}', 'TicketController@show');
Route::put('/tickets/{ticket}', 'TicketController@update')->middleware('permission:edit ticket');
Route::delete('/tickets/{ticket}', 'TicketController@destroy')->middleware('permission:delete ticket');
Route::get('/tickets/{ticket}/edit', 'TicketController@edit');
