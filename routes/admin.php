<?php 


// Route Admin

Route::get('/' , 'HomeController@index')->name('dashboard');

Route::get('/penulis' , 'PenulisController@index')->name('penulis');

Route::get('/data/penulis' , 'DataAuthorsController@authors')->name('data.penulis');

Route::get('/buku' , 'BukuController@index')->name('buku');


Route::post('/penulis' , 'PenulisController@store')->name('tambahPenulis');