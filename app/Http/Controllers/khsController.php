<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khs;
use App\mahasiswa;
use App\matakuliah;

class khsController extends Controller
{
    public function index()
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        	$khs = khs::paginate(10);
            return response()->json($khs->toArray());
        }
    }

     public function store(Request $request)
    {
        $user=Auth::user();

        if($user->id_level!=2){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }
        else{
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
    }

    public function show($id)
    {
        
    	$khs = khs::find($id);
        return response()->json($khs->toArray());
    }


    public function update(Request $request, $id)
    {
        $user=Auth::user();

        if($user->id_level!=2){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
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
    }


    public function destroy($id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
            $khs = khs::find($id);
            $khs->delete();
            return response()->json($khs->toArray());
        }
    }
}
