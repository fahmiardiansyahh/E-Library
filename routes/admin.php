<?php 


// Route Admin

// Route Data

Route::get('/' , 'HomeController@index')->name('dashboard');

Route::get('/data/penulis' , 'DataController@authors')->name('data.penulis');

Route::get('/data/buku' , 'DataController@books')->name('data.buku');

// Route Penulis

Route::get('/penulis' , 'PenulisController@index')->name('penulis');

Route::post('/penulis' , 'PenulisController@store')->name('tambahPenulis');

Route::post('/penulis/data' , 'PenulisController@show')->name('TampilPenulis');

Route::put('/penulis/data/edit', 'PenulisController@update')->name('EditPenulis');

Route::delete('/penulis/data/id/{id}', 'PenulisController@destroy')->name('HapusPenulis');

// Route::resource('penulis', 'PenulisController');


// Data Buku
Route::get('/buku' , 'BukuController@index')->name('buku');

Route::post('/buku', 'BukuController@store')->name('tambahBuku');

Route::post('/buku/data' , 'BukuController@show')->name('TampilBuku');

Route::put('/buku/data/edit', 'BukuController@update')->name('EditBuku');

Route::delete('/buku/data/id/{id}' , 'BukuController@destroy')->name('HapusDataBuku');


