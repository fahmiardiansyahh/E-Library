<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;
use Validator;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Admin.penulis');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //use if not using AJAX
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Request Ajax
         $validation = Validator::make($request->all(), [
             'nama' => 'required|unique:authors,nama'
        ]);
    
         $errordata = [];

        if ($validation->fails() ) {

            foreach($validation->messages()->getMessages() as $value => $statusError)
            {

                $errordata = [
                "error" => $statusError ,
                "errorStatus" => 0
                ];

            }

        } else {
           
           $errordata = [

                "error" => 'Data Berhasil Ditambahkan' ,
                "errorStatus" => 1

            ];

            Author::create($request->all());

        }

        echo json_encode($errordata);

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //show
        $user = Author::where('id' , $request->id)->get();
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //use if not using AJAX
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

        //Request Ajax

        $validation = Validator::make($request->all(), [
             'nama' => 'required|unique:authors,nama'
        ],[
            'nama.unique' => 'Try with Another Name to Changed!'
        ]);
    
         $errordata = [];

        if ($validation->fails() ) {

            foreach($validation->messages()->getMessages() as $value => $statusError)
            {

                $errordata = [
                "error" => $statusError ,
                "errorStatus" => 0
                ];

            }

        } else {
           
           $errordata = [

                "error" => 'Data Berhasil DiUbah' ,
                "errorStatus" => 1

            ];

             Author::where('id', $request->id)
                ->update([
                    'nama' => $request->nama
                ]);

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
           $errordata = [

                "error" => 'Data Berhasil DiHapus' ,
                "errorStatus" => 1

            ];
             //delete
        Author::where('id', $id)->delete();

        return response()->json($errordata);
    }
}
