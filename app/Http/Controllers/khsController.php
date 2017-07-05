<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khs;
use Input;

class khsController extends Controller
{
    public function index()
    {
    	$khs = khs::get();
        return response()->json($khs->toArray());
    }

     public function store(Request $request)
    {
            $this->validate($request, [
                'nim'=>'required',
	    		'id_matkul'=>'required',
	    		'absensi'=>'required',
	    		'tugas'=>'required',
	    		'uts'=>'required',
	    		'uas'=>'required',
	    		'grade'=>'required',
                ]);
        $khs = new khs();
        $khs->nim = $request->input('nim');
        $khs->id_matkul = $request->input('id_matkul');
        $khs->absensi = $request->input('absensi');
        $khs->tugas = $request->input('tugas');
        $khs->uts = $request->input('uts');
        $khs->uas = $request->input('uas');
        $khs->grade = $request->input('grade');
        $khs->save();
        return response()->json($khs);
    }

    public function show($id)
    {
    	$khs = khs::find($id);
        return response()->json($khs->toArray());
    }


    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'nim'=>'required',
    		'id_matkul'=>'required',
    		'absensi'=>'required',
    		'tugas'=>'required',
    		'uts'=>'required',
    		'uas'=>'required',
    		'grade'=>'required',
            ]);
    	$khs = khs::find($id);
        $khs->nim = $request->input('nim');
        $khs->id_matkul = $request->input('id_matkul');
        $khs->absensi = $request->input('absensi');
        $khs->tugas = $request->input('tugas');
        $khs->uts = $request->input('uts');
        $khs->uas = $request->input('uas');
        $khs->grade = $request->input('grade');
        $khs->save();
        return response()->json($khs->toArray());
    }

    public function destroy($id)
    {
        $khs = khs::find($id);
        $khs->delete();
        return response()->json($khs->toArray());
    }
}
