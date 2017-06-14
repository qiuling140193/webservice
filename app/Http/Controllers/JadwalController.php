<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jdwl;
use Input;

class JadwalController extends Controller
{
    public function index()
    {
    	$jadwal = jdwl::get();
    	
        return response()->json($jadwal->toArray());
    }

     public function store(Request $request)
    {

        try{
            $this->validate($request, [
                'semester'=>'required',
	    		'hari'=>'required',
	    		'id_jurusan'=>'required',
	    		'nid'=>'required',
	    		'id_kelas'=>'required',
	    		'id_jam'=>'required',
	    		'id_matakuliah'=>'required',
                ]);
        } catch(\Exception $e) {
            throw new Exception("Salah"); 
            } 

        $jadwal = new jdwl();
        $jadwal->jadwal = $request->input('semester');
        $jadwal->jadwal = $request->input('hari');
        $jadwal->jadwal = $request->input('id_jurusan');
        $jadwal->jadwal = $request->input('nid');
        $jadwal->jadwal = $request->input('id_kelas');
        $jadwal->jadwal = $request->input('id_jam');
        $jadwal->jadwal = $request->input('id_matakuliah');
        $jadwal->save();
        
        return response()->json($jadwal);
    }

    public function show(Request $request)
    {
    	$jadwal = jdwl::find($id);

        return response()->json($jadwal->toArray());

    }


    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'semester'=>'required',
    		'hari'=>'required',
    		'id_jurusan'=>'required',
    		'nid'=>'required',
    		'id_kelas'=>'required',
    		'id_jam'=>'required',
    		'id_matakuliah'=>'required',]);
    	$jadwal = jdwl::find($id);
        $jadwal->jadwal = $request->input('semester');
        $jadwal->jadwal = $request->input('hari');
        $jadwal->jadwal = $request->input('id_jurusan');
        $jadwal->jadwal = $request->input('nid');
        $jadwal->jadwal = $request->input('id_kelas');
        $jadwal->jadwal = $request->input('id_jam');
        $jadwal->jadwal = $request->input('id_matakuliah');

        $jadwal->save();

        return response()->json($jadwal->toArray());
    }

    public function destroy($id)
    {
        $jadwal = jdwl::find($id);
        $jadwal->delete();

        return response()->json($jadwal->toArray());
    }
}
