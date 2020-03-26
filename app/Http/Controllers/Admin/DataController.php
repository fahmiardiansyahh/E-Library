<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    //Data Author
    public function authors() {


    	 return datatables()->of(Author::orderBy('nama' , 'DESC'))
    	 ->addColumn('aksi', function(Author $authors) {
    	 	return view('admin.EditData' , [
    	 		'authors' => $authors
    	 	]);
    	 })
    	 ->addIndexColumn()
    	 ->toJson();

    }

    // Data Buku
    public function books() {

        $book = Book::orderBy('title' , 'ASC') ;


    	return datatables()->of($book)
         ->addColumn('NamaAuthor', function(Book $model) {
            return '<b>' .$model->author->nama.  '</b>';
            })
          ->addColumn('aksi', function(Book $model) {
            return '
            <a href="" class="btn btn-sm btn-warning EditDataBuku">Edit</a> | &nbsp;
            <a href="'. url()->route('admin.HapusDataBuku' , ['id' => $model->id]) .'" class="btn btn-sm btn-danger HapusDataBuku" data-id="'. $model->id .'" data-name="' . $model->title . '">Hapus</a>
            ';
            })
          ->editColumn('cover' , function (Book $model) {
            return '<img src="' . $model->getCover() . '" height="75" width="100" > ';
          })
         ->addIndexColumn()
         ->rawColumns(['NamaAuthor','aksi','cover'])

        ->toJson();

    }
}
