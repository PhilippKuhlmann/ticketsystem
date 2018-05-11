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

Route::get('/', 'DashboardController@index')->middleware('auth');

Auth::routes();
Route::get('/verify/{token}', 'VerifyController@verify')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tickets', 'TicketController@index')->middleware('permission:see all tickets');
Route::post('/tickets', 'TicketController@store')->middleware('permission:create ticket');
Route::get('/tickets/create', 'TicketController@create')->middleware('permission:create ticket');
Route::get('/tickets/{ticket}', 'TicketController@show')->middleware('auth');
Route::put('/tickets/{ticket}', 'TicketController@update')->middleware('permission:edit ticket');
Route::delete('/tickets/{ticket}', 'TicketController@destroy')->middleware('permission:delete ticket');
Route::get('/tickets/{ticket}/edit', 'TicketController@edit')->middleware('permission:edit ticket');


Route::get('/customers', 'CustomerController@index')->middleware('auth');
Route::get('/customer/{customer}', 'CustomerController@show')->middleware('auth');

Route::get('/admin', 'AdminController@dashboard')->middleware('role:root|admin');
