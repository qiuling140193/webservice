<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jurusan;
use Input;

class JurusanController extends Controller
{
    public function index()
    {
    	$jurusan = jurusan::get();
    	
        return response()->json($jurusan->toArray());
    }

     public function store(Request $request)
    {

        try{
            $this->validate($request, [
                'nama'=>'required',
                'id_fakultas'=>'required',
                ]);
        } catch(\Exception $e) {
            throw new Exception("Salah"); 
            } 

        $jurusan = new jurusan();

        $jurusan->jurusan = $request->input('nama');
        $jurusan->save();

        return response()->json($jurusan);
    }

    public function show(Request $request)
    {
    	$jurusan = jurusan::find($id);

        return response()->json($jurusan->toArray());

    }


    public function update(Request $request, $id)
    {
    	$this->validate($request, ['nama'=>'required','id_fakultas'=>'required',]);
    	$jurusan = jurusan::find($id);
        $jurusan->jurusan = $request->input('nama');
        $jurusan->jurusan = $request->input('id_fakultas');

        $jurusan->save();

        return response()->json($jurusan->toArray());
    }

    public function destroy($id)
    {
        $jurusan = jurusan::find($id);
        $jurusan->delete();

        return response()->json($jurusan->toArray());
    }
}
