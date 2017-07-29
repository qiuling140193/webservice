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
        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        
        	$krs = krs::paginate();
            return response()->json($krs->toArray());
        }
    }

     public function store(Request $request)
    {
             $user=Auth::user();

            if($user->id_level!=3){

                return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

            }
            else{
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
    }

    public function show($id)
    {
    	$krs = krs::find($id);
        return response()->json($krs->toArray());
    }


    public function update(Request $request, $id)
    {
         $user=Auth::user();

        if($user->id_level!=3){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }
        else{
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
    }

    public function destroy($id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
            $krs = krs::find($id);
            $krs->delete();
            return response()->json($krs->toArray());
        }
    }
}
