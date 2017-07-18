<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\matakuliah;


class MataKuliahController extends Controller
{
    public function index()
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

            }else {
        	$matakuliah = matakuliah::paginate();
            return response()->json($matakuliah->toArray());
        }
    }

     public function store(Request $request)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
                $this->validate($request, [
                    'nama'=>'required',
                    'sks'=>'required',
                    ]);

            $matakuliah = new matakuliah();
            $matakuliah->nama = $request->input('nama');
            $matakuliah->sks = $request->input('sks');
            $matakuliah->save();
            return response()->json($matakuliah);
        }
    }

    public function show($id)
    {
    	$matakuliah = matakuliah::find($id);
        return response()->json($matakuliah->toArray());

    }


    public function update(Request $request, $id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
            $this->validate($request, [
                    'nama'=>'required',
                    'sks'=>'required',
                    ]);
        	$matakuliah = matakuliah::find($id);
            $matakuliah->nama = $request->input('nama');
            $matakuliah->sks = $request->input('sks');
            $matakuliah->save();
            return response()->json($matakuliah->toArray());
        }
    }

    public function destroy($id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
            $matakuliah = matakuliah::find($id);
            $matakuliah->delete();
            return response()->json($matakuliah->toArray());
        }
    }
}
