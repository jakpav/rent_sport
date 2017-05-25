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

Route::get('/', 'WebsiteController@index');
Route::get('/about', 'WebsiteController@about');
Route::get('/sport-grounds', 'WebsiteController@sport_grounds');
Route::get('/reservation', 'WebsiteController@reservation');
Route::post('/reservation', 'WebsiteController@make_reservation');
Route::get('/contact', 'WebsiteController@contact');
Route::post('/contact', 'WebsiteController@contact');

Auth::routes();

Route::get('/admin', 'AdminController@index');//->name('home');
Route::get('/admin/reservations', 'AdminController@reservations');
Route::get('/admin/playgrounds', 'AdminController@playgrounds');
Route::get('/admin/customers', 'AdminController@customers');
Route::get('/admin/discounts', 'AdminController@discounts');

Route::get('/admin/playgrounds/add', 'AdminController@add_playground');
Route::post('/admin/playgrounds/add', 'AdminController@insert_playground');
Route::get('/admin/playgrounds/delete', 'AdminController@delete_playground');
Route::post('/admin/playgrounds/delete', 'AdminController@delete_db_playground');

Route::get('/admin/reservations/add', 'AdminController@add_reservation');
Route::post('/admin/reservations/add', 'AdminController@insert_reservation');
Route::get('/admin/reservations/delete', 'AdminController@delete_reservation');
Route::post('/admin/reservations/delete', 'AdminController@delete_db_reservation');

