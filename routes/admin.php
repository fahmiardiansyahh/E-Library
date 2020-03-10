<?php 


// Route Admin

Route::get('/' , 'HomeController@index')->name('dashboard');

Route::get('/penulis' , 'PenulisController@index')->name('penulis');

Route::get('/data/penulis' , 'DataAuthorsController@authors')->name('data.penulis');

Route::get('/buku' , 'BukuController@index')->name('buku');

Route::delete('/data/penulis/id/{id}', 'PenulisController@destroy')->name('HapusPenulis');

Route::post('/penulis' , 'PenulisController@store')->name('tambahPenulis');

Route::post('/data/penulis' , 'PenulisController@show')->name('TampilPenulis');

Route::put('/data/penulis/edit', 'PenulisController@update')->name('EditPenulis');