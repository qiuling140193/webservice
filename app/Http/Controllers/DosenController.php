<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dosen;
use Input;

class DosenController extends Controller
{
    public function index()
    {
    	$dosen = dosen::get();
    	
        return response()->json($dosen->toArray());
    }

     public function store(Request $request)
    {

        try{
            $this->validate($request, [
                'nama'=>'required',
	    		'tempat_lahir'=>'required',
	    		'tanggal_lahir'=>'required',
	    		'gender'=>'required',
	    		'phone'=>'required',
	    		'email'=>'required',
                ]);
        } catch(\Exception $e) {
            throw new Exception("Salah"); 
            } 

        $dosen = new dosen();

        $dosen->dosen = $request->input('nama');
        $dosen->dosen = $request->input('tempat_lahir');
        $dosen->dosen = $request->input('tanggal_lahir');
        $dosen->dosen = $request->input('gender');
        $dosen->dosen = $request->input('phone');
        $dosen->dosen = $request->input('email');
        $dosen->save();

        return response()->json($dosen);
    }

    public function show(Request $request)
    {
    	$dosen = dosen::find($nid);

        return response()->json($dosen->toArray());

    }


    public function update(Request $request, $nid)
    {
    	$this->validate($request, [
    		'nama'=>'required',
    		'tempat_lahir'=>'required',
    		'tanggal_lahir'=>'required',
    		'gender'=>'required',
    		'phone'=>'required',
    		'email'=>'required',]);
    	$dosen = dosen::find($nid);
        $dosen->dosen = $request->input('nama');
        $dosen->dosen = $request->input('tempat_lahir');
        $dosen->dosen = $request->input('tanggal_lahir');
        $dosen->dosen = $request->input('gender');
        $dosen->dosen = $request->input('phone');
        $dosen->dosen = $request->input('email');

        $dosen->save();

        return response()->json($dosen->toArray());
    }

    public function destroy($nid)
    {
        $dosen = dosen::find($nid);
        $dosen->delete();

        return response()->json($dosen->toArray());
    }
}
