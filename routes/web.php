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

Route::get('/', 'frontend\HomeController@bukuLimit')->name('root')->middleware('guest');

Route::get('/books' , 'frontend\BookController@index')->name('books');

Route::get('/book/{book}/detail', 'frontend\BookController@show')->name('book.details');

Route::get('/book/borrowed' , 'frontend\BookController@borrowed')->name('book.borrowed')->middleware('auth');

Route::post('/book/{book}/borrow' , 'frontend\BookController@store')->name('book.borrow')->middleware('auth');

Route::get('/contact' , 'frontend\HomeController@contact')->name('contact')->middleware('guest');

Route::get('/about' , 'frontend\HomeController@about')->name('about')->middleware('guest');


Auth::routes(['verify' => true]);

Route::get('/home', 'frontend\HomeController@bukuLimit')->name('home')->middleware('verified');
