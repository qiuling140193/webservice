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
            $this->validate($request, [
                'semester'=>'required',
	    		'hari'=>'required',
	    		'id_jurusan'=>'required',
	    		'nid'=>'required',
	    		'id_kelas'=>'required',
	    		'id_jam'=>'required',
	    		'id_matakuliah'=>'required',
                ]);
        $jadwal = new jdwl();
        $jadwal->semester = $request->input('semester');
        $jadwal->hari = $request->input('hari');
        $jadwal->id_jurusan = $request->input('id_jurusan');
        $jadwal->nid = $request->input('nid');
        $jadwal->id_kelas = $request->input('id_kelas');
        $jadwal->id_jam = $request->input('id_jam');
        $jadwal->id_matakuliah = $request->input('id_matakuliah');
        $jadwal->save();
        return response()->json($jadwal);
    }

    public function show($id)
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
        $jadwal->semester = $request->input('semester');
        $jadwal->hari = $request->input('hari');
        $jadwal->id_jurusan = $request->input('id_jurusan');
        $jadwal->nid = $request->input('nid');
        $jadwal->id_kelas = $request->input('id_kelas');
        $jadwal->id_jam = $request->input('id_jam');
        $jadwal->id_matakuliah = $request->input('id_matakuliah');
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
