<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dosen;


class DosenController extends Controller
{
    public function index()
    {
    	$dosen = dosen::get();	
        return response()->json($dosen->toArray());
    }

     public function store(Request $request)
    {
            $this->validate($request, [
                'nama'=>'required',
	    		'tempat_lahir'=>'required',
	    		'tanggal_lahir'=>'required',
	    		'gender'=>'required',
	    		'phone'=>'required',
	    		'email'=>'required',
                ]);
        $dosen = new dosen();
        $dosen->nama = $request->input('nama');
        $dosen->tempat_lahir = $request->input('tempat_lahir');
        $dosen->tanggal_lahir = $request->input('tanggal_lahir');
        $dosen->gender = $request->input('gender');
        $dosen->phone = $request->input('phone');
        $dosen->email = $request->input('email');
        $dosen->save();
        return response()->json($dosen);
    }

    public function show($nid)
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
        $dosen->nama = $request->input('nama');
        $dosen->tempat_lahir = $request->input('tempat_lahir');
        $dosen->tanggal_lahir = $request->input('tanggal_lahir');
        $dosen->gender = $request->input('gender');
        $dosen->phone = $request->input('phone');
        $dosen->email = $request->input('email');
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
