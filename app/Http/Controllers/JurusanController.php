<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jurusan;
use Auth;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class JurusanController extends Controller
{
    public function index()
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {

        	$jurusan = jurusan::get();
        	
            return response()->json($jurusan->toArray());
        }
    }

     public function store(Request $request)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {

            try{
                $this->validate($request, [
                    'nama'=>'required',
                    'id_fakultas'=>'required',
                    ]);
            } catch(\Exception $e) {
                throw new Exception("Salah"); 
                } 

            $jurusan = new jurusan();

            $jurusan->nama = $request->input('nama');
            $jurusan->id_fakultas = $request->input('id_fakultas');
            $jurusan->save();
            
            return response()->json($jurusan);
        }
    }

    public function show(Request $request)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        	$jurusan = jurusan::find($id);

            return response()->json($jurusan->toArray());
        }
    }


    public function update(Request $request, $id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        	$this->validate($request, ['nama'=>'required','id_fakultas'=>'required',]);
        	$jurusan = jurusan::find($id);
            $jurusan->nama = $request->input('nama');
            $jurusan->id_fakultas = $request->input('id_fakultas');
            $jurusan->save();

            return response()->json($jurusan->toArray());
        }
    }

    public function destroy($id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
            $jurusan = jurusan::find($id);
            $jurusan->delete();

            return response()->json($jurusan->toArray());
        }
    }
}
