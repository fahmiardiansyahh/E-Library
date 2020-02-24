<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;


class DataAuthorsController extends Controller
{
    //Data Author
    public function authors() {

    	 return datatables()->of(Author::query())->toJson();

    }
}
