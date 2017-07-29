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
use App\matakuliah;
use App\jam;
use App\mahasiswa;

class JadwalController extends Controller
{
    public function index()
    {
        $user=Auth::user();

        if($user->id_level==3){

            $mahasiswa = Auth::jdwl()->profile;
            return $mahasiswa;

        }elseif ($user->id_level ==1) {

        	$jadwal = jdwl::paginate(5);

            return response()->json($jadwal->toArray());

        }elseif ($user->id_level==2){

           $dosen = Auth::jdwl()->profile;

            return $dosen;
        }
    }

     public function store(Request $request)
    {


        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {

                $this->validate($request, [
                    'semester'=>'required',
    	    		'hari'=>'required',
    	    		'id_jurusan'=>'required',
    	    		'id_dosen'=>'required',
    	    		'id_kelas'=>'required',
    	    		'id_jam'=>'required',
    	    		'id_matakuliah'=>'required',
                    ]);

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
    	 $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {

                $this->validate($request, [
                    'semester'=>'required',
                    'hari'=>'required',
                    'id_jurusan'=>'required',
                    'id_dosen'=>'required',
                    'id_kelas'=>'required',
                    'id_jam'=>'required',
                    'id_matakuliah'=>'required',
                    ]);
           
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

    }

    public function destroy($id)
    {
            if($user->id_level!=1){

                return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

            }else {
            $jadwal = jdwl::find($id);
            $jadwal->delete();
            return response()->json($jadwal->toArray());
        }
    }
}
