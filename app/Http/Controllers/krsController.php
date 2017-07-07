<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\krs;
use App\mahasiswa;
use App\matakuliah;
use Input;

class krsController extends Controller
{
    public function index()
    {
    	$krs = krs::paginate();
        return response()->json($krs->toArray());
    }

     public function store(Request $request)
    {
            $this->validate($request, [
                'nim'=>'required',
                'id_matkul'=>'required',
                ]);
        $krs = new krs();
        $krs->nim = $request->input('nim');
        $krs->id_matkul = $request->input('id_matkul');
        $krs->save();
        return response()->json($krs);
    }

    public function show($id)
    {
    	$krs = krs::find($id);
        return response()->json($krs->toArray());
    }


    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'nim'=>'required', 
            'id_matkul'=>'required',
            ]);
    	$krs = krs::find($id);
        $krs->nim = $request->input('nim');
        $krs->id_matkul = $request->input('id_matkul');
        $krs->save();
        return response()->json($krs->toArray());
    }

    public function destroy($id)
    {
        $krs = krs::find($id);
        $krs->delete();
        return response()->json($krs->toArray());
    }
}
