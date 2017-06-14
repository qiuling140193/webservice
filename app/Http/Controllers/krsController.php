<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\krs;
use Input;

class krsController extends Controller
{
    public function index()
    {
    	$krs = krs::get();
    	
        return response()->json($krs->toArray());
    }

     public function store(Request $request)
    {

        try{
            $this->validate($request, [
                'nim'=>'required',
                'id_matkul'=>'required',
                ]);
        } catch(\Exception $e) {
            throw new Exception("Salah"); 
            } 

        $krs = new krs();

        $krs->krs = $request->input('nim');
        $krs->krs = $request->input('id_matkul');
        $krs->save();

        return response()->json($krs);
    }

    public function show(Request $request)
    {
    	$krs = krs::find($id);

        return response()->json($krs->toArray());

    }


    public function update(Request $request, $id)
    {
    	$this->validate($request, ['nim'=>'required', 'id_matkul'=>'required',]);
    	$krs = krs::find($id);
        $krs->krs = $request->input('nim');
        $krs->krs = $request->input('id_matkul');

        $krs->save();

        return response()->json($krs->toArray());
    }

    public function destroy($id)
    {
        $krs = krs::find($id);
        $krs->delete();

        return response()->json($krs->toArray());
    }
}
