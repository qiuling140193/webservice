<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fakultas;
use Input;

class FakultasController extends Controller
{
    public function index()
    {
    	$fakultas = fakultas::get();
    	
        return response()->json($fakultas->toArray());
    }

     public function store(Request $request)
    {

        try{
            $this->validate($request, [
                'nama'=>'required',
                ]);
        } catch(\Exception $e) {
            throw new Exception("Salah"); 
            } 

        $fakultas = new fakultas();

        $fakultas->fakultas = $request->input('nama');
        $fakultas->save();

        return response()->json($fakultas);
    }

    public function show(Request $request)
    {
    	$fakultas = fakultas::find($id);

        return response()->json($fakultas->toArray());

    }


    public function update(Request $request, $id)
    {
    	$this->validate($request, ['nama'=>'required',]);
        $fakultas = fakultas::find($id);
        $fakultas->fakultas = $request->input('nama');


        $fakultas->save();

        return response()->json($fakultas->toArray());
    }

    public function destroy($id)
    {
        $fakultas = fakultas::find($id);
        $fakultas->delete();

        return response()->json($fakultas->toArray());
    }
}
