<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fakultas;


class FakultasController extends Controller
{
    public function index()
    {
    	$fakultas = fakultas::get();
        return response()->json($fakultas->toArray());
    }

     public function store(Request $request)
    {
            $this->validate($request, [
                'nama'=>'required',
                ]); 
        $fakultas = new fakultas();
        $fakultas->nama = $request->input('nama');
        $fakultas->save();
        return response()->json($fakultas);
    }

    public function show($id)
    {
    	$fakultas = fakultas::find($id);
        return response()->json($fakultas->toArray());
    }


    public function update(Request $request, $id)
    {
    	$this->validate($request, ['nama'=>'required',]);
        $fakultas = fakultas::find($id);
        $fakultas->nama = $request->input('nama');
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
