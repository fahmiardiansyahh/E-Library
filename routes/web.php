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

Route::get('/', 'frontend\HomeController@bukuLimit')->name('root');

Route::get('/book' , 'frontend\BookController@index')->name('books');

Route::get('/book/{book}/detail', 'frontend\BookController@show')->name('book.details');

Route::post('/book/{book}/borrow' , 'frontend\BookController@store')->name('book.borrow')->middleware('auth');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
