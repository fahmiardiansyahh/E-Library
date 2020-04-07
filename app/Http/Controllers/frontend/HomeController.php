<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class HomeController extends Controller
{
    //
	public function bukuLimit() {

		$book = Book::limit(5)->get();

		return view ('frontend.HomePageDefault' , compact('book'));


	}

}
