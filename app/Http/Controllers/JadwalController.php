<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jdwl;
use Auth;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\jurusan;
use App\dosen;
use App\kelas;
use App\id_matakuliah;
use App\jam;

class JadwalController extends Controller
{
    public function index()
    {

    	$jadwal = jdwl::get();
        return response()->json($jadwal->toArray());
    }

     public function store(Request $request)
    {

        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {

            try{
                $this->validate($request, [
                    'semester'=>'required',
    	    		'hari'=>'required',
    	    		'id_jurusan'=>'required',
    	    		'id_dosen'=>'required',
    	    		'id_kelas'=>'required',
    	    		'id_jam'=>'required',
    	    		'id_matakuliah'=>'required',
                    ]);
            } catch(\Exception $e) {
                throw new Exception("Salah"); 
                } 

            $jadwal = new jdwl();
            $jadwal->semester = $request->input('semester');
            $jadwal->hari = $request->input('hari');
            $jadwal->id_jurusan = $request->input('id_jurusan');
            $jadwal->id_dosen = $request->input('id_dosen');
            $jadwal->id_kelas = $request->input('id_kelas');
            $jadwal->id_jam = $request->input('id_jam');
            $jadwal->id_matakuliah = $request->input('id_matakuliah');
            $jadwal->save();
            
            return response()->json($jadwal->toArray());
        }

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
    		'id_dosen'=>'required',
    		'id_kelas'=>'required',
    		'id_jam'=>'required',
    		'id_matakuliah'=>'required',]);
    	$jadwal = jdwl::find($id);
        $jadwal->semester = $request->input('semester');
        $jadwal->hari = $request->input('hari');
        $jadwal->id_jurusan = $request->input('id_jurusan');
        $jadwal->id_dosen = $request->input('id_dosen');
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
