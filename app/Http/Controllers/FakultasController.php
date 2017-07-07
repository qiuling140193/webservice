<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fakultas;
use Auth;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class FakultasController extends Controller
{
    public function index()
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        	$fakultas = fakultas::get();
        	
            return response()->json($fakultas->toArray());
        }
    	$fakultas = fakultas::paginate();
        return response()->json($fakultas->toArray());
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
                        ]);
                } catch(\Exception $e) {
                    throw new Exception("Salah"); 
                    } 

                $fakultas = new fakultas();

                $fakultas->nama = $request->input('nama');
                $fakultas->save();

                return response()->json($fakultas);
            }
        }


    public function show($id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        	$fakultas = fakultas::find($id);

            return response()->json($fakultas->toArray());
        }   
    }


    public function update(Request $request, $id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        	$this->validate($request, ['nama'=>'required',]);
            $fakultas = fakultas::find($id);
            $fakultas->nama = $request->input('nama');


            $fakultas->save();

            return response()->json($fakultas->toArray());
        }
    }


    public function destroy($id)
    {

        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
            $fakultas = fakultas::find($id);
            $fakultas->delete();

            return response()->json($fakultas->toArray());
        }

    }
}
