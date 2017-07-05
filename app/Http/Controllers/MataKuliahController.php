<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\matakuliah;
use Input;

class MataKuliahController extends Controller
{
    public function index()
    {
    	$matakuliah = matakuliah::get();
        return response()->json($matakuliah->toArray());
    }

     public function store(Request $request)
    {
            $this->validate($request, [
                'nama'=>'required',
                'sks'=>'required',
                ]);

        $matakuliah = new matakuliah();
        $matakuliah->nama=$request->input('nama');
        $matakuliah->sks=$request->input('sks');
        $matakuliah->save();
        return response()->json($matakuliah);
    }

    public function show($id)
    {
    	$matakuliah = matakuliah::find($id);
        return response()->json($matakuliah->toArray());

    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'nama'=>'required',
                'sks'=>'required',
                ]);
    	$matakuliah = matakuliah::find($id);
        $matakuliah->nama=$request->input('nama');
        $matakuliah->sks=$request->input('sks');
        $matakuliah->save();
        return response()->json($matakuliah->toArray());
    }

    public function destroy($id)
    {
        $matakuliah = matakuliah::find($id);
        $matakuliah->delete();
        return response()->json($matakuliah->toArray());
    }
}
