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

        try{
            $this->validate($request, [
                'nim'=>'required',
	    		'id_matkul'=>'required',
	    		'absensi'=>'required',
	    		'tugas'=>'required',
	    		'uts'=>'required',
	    		'uas'=>'required',
	    		'grade'=>'required',
                ]);
        } catch(\Exception $e) {
            throw new Exception("Salah"); 
            } 

        $khs = new khs();

        $khs->khs = $request->input('nim');
        $khs->khs = $request->input('id_matkul');
        $khs->khs = $request->input('absensi');
        $khs->khs = $request->input('tugas');
        $khs->khs = $request->input('uts');
        $khs->khs = $request->input('uas');
        $khs->khs = $request->input('grade');
        $khs->save();

        return response()->json($khs);
    }

    public function show(Request $request)
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
    		'grade'=>'required',]);
    	$khs = khs::find($id);
        $khs->khs = $request->input('nim');
        $khs->khs = $request->input('id_matkul');
        $khs->khs = $request->input('absensi');
        $khs->khs = $request->input('tugas');
        $khs->khs = $request->input('uts');
        $khs->khs = $request->input('uas');
        $khs->khs = $request->input('grade');

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
