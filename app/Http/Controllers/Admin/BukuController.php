<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;
use App\Book;
use Validator;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //data combo box
        $buku =  Author::has('book')->get();
        return view('admin.buku', ['buku' => $buku]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $validation = Validator::make($request->all(),[
            'author_id' => 'required',
            'judul_buku' => 'required|unique:books,title',
            'deskripsi_buku' => 'required|min:20',
            'qty_buku' => 'required|numeric',
            'gambar_buku' => 'image|mimes:jpeg,png|max:500'
        ],[
            // Massage Customs
            // for max change to -> uploaded
            'author_id.required' => 'The Author Name Field is required',
            'gambar_buku.mimes' => 'Your Image Must JPEG/PNG File',
            'gambar_buku.uploaded' => 'Your Image Size Must Max 500Kb'

        ]);

        $errordata = [];

        // Validation fails
        if ($validation->fails() ) {


            $errordata = [
                'error' => 1 ,
                'author_id' => $validation->errors()->first('author_id'),
                'judul_buku'=> $validation->errors()->first('judul_buku'),
                'deskripsi_buku' => $validation->errors()->first('deskripsi_buku'),
                'qty_buku' => $validation->errors()->first('qty_buku'),
                'gambar_buku' => $validation->errors()->first('gambar_buku') 
            ];


           

        } else {
            // Validation Success

            // Check Cover is  null
            if (empty($request->file('gambar_buku')) ) {

                $cover = null;

                  // Simpan Data Ke database
                    $buku = Book::create([
                        'author_id' => $request->author_id,
                        'title' => $request->judul_buku,
                        'description' => $request->deskripsi_buku,
                        'cover' => $cover,
                        'qty' => $request->qty_buku
                    ]);

                    // $buku running
                    if ($buku) {

                        $errordata = [
                            'error' => 0 ,
                            'msg' => 'Successfully Data Has Been Saved'
                        ];


                    }


            } else {

                // Not Null
                  // Take Picture Cover
                    $cover = $request->file('gambar_buku')->store('assets/covers');

                    // Simpan Data Ke database
                    $buku = Book::create([
                        'author_id' => $request->author_id,
                        'title' => $request->judul_buku,
                        'description' => $request->deskripsi_buku,
                        'cover' => $cover,
                        'qty' => $request->qty_buku
                    ]);

                    // $buku running
                    if ($buku) {

                        $errordata = [
                            'error' => 0 ,
                            'msg' => 'Successfully Data Has Been Saved!'
                        ];


                    }




            }


          



        }


    return response()->json($errordata);


        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // get data
    $buku = Book::where('id' , $request->id)->get();

    return response()->json($buku);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Request
         //validation
        $validation = Validator::make($request->all(),[
            'author_id' => 'required',
            'judul_buku' => 'required',
            'deskripsi_buku' => 'required|min:20',
            'qty_buku' => 'required|numeric',
            'gambar_buku' => 'image|mimes:jpeg,png|max:500'
        ],[
            // Massage Customs
            // for max change to -> uploaded
            'author_id.required' => 'The Author Name Field is required',
            'gambar_buku.mimes' => 'Your Image Must JPEG/PNG File',
            'gambar_buku.uploaded' => 'Your Image Size Must Max 500Kb'

        ]);

        $errordata = [];

         // Validation fails
        if ($validation->fails() ) {


            $errordata = [
                'error' => 1 ,
                'author_id' => $validation->errors()->first('author_id'),
                'judul_buku'=> $validation->errors()->first('judul_buku'),
                'deskripsi_buku' => $validation->errors()->first('deskripsi_buku'),
                'qty_buku' => $validation->errors()->first('qty_buku'),
                'gambar_buku' => $validation->errors()->first('gambar_buku') 
            ];


           

        } else {
            // Validation Success

            // Check Cover is  null
            if (empty($request->file('gambar_buku')) ) {

               // Gambar Lama 
                $book = Book::where('id' , $request->id_buku)->first();
                $cover = $book->cover;

                  // Ubah Data Ke database
                    $buku = Book::where('id' , $request->id_buku)
                            ->update([

                            'author_id' => $request->author_id,
                            'title' => $request->judul_buku,
                            'description' => $request->deskripsi_buku,
                            'cover' => $cover,
                            'qty' => $request->qty_buku

                            ]);

                    // $buku running
                    if ($buku) {

                        $errordata = [
                            'error' => 0 ,
                            'msg' => 'Successfully Data Has Been Updated'
                        ];


                    }


            } else {

                // Not Null
                  // Take Picture Cover
                    $cover = $request->file('gambar_buku')->store('assets/covers');

                    // Ubah Data Ke database
                     $buku = Book::where('id' , $request->id_buku)
                            ->update([

                            'author_id' => $request->author_id,
                            'title' => $request->judul_buku,
                            'description' => $request->deskripsi_buku,
                            'cover' => $cover,
                            'qty' => $request->qty_buku

                            ]);

                    // $buku running
                    if ($buku) {

                        $errordata = [
                            'error' => 0 ,
                            'msg' => 'Successfully Data Has Been Updated!'
                        ];


                    }




            }


          



        }


        return response()->json($errordata);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete

       $buku = Book::where('id', $id)->delete();


       if ($buku) {

            $errordata = [

                'msg' => 'Successfully Data Has Been Deleted!'


            ];


       }


        return response()->json($errordata);



    }
}
