<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mahasiswa;
use Input;

class MahasiswaController extends Controller
{
    public function index()
    {
    	$mahasiswa = mahasiswa::get();
    	
        return response()->json($mahasiswa->toArray());
    }

     public function store(Request $request)
    {

        try{
            $this->validate($request, [
                'nama'=>'required',
	    		'tempat_lahir'=>'required',
	    		'tanggal_lahir'=>'required',
	    		'gender'=>'required',
	    		'alamat'=>'required',
	    		'phone'=>'required',
	    		'email'=>'required',
	    		'tahun'=>'required',
	    		'id_fakultas'=>'required',
	    		'id_jurusan'=>'required',
               ]);
        } catch(\Exception $e) {
            throw new Exception("Salah"); 
            } 

        $mahasiswa = new mahasiswa();

        $mahasiswa->mahasiswa = $request->input('nama');
        $mahasiswa->mahasiswa = $request->input('tempat_lahir');
        $mahasiswa->mahasiswa = $request->input('tanggal_lahir');
        $mahasiswa->mahasiswa = $request->input('gender');
        $mahasiswa->mahasiswa = $request->input('alamat');
        $mahasiswa->mahasiswa = $request->input('phone');
        $mahasiswa->mahasiswa = $request->input('email');
        $mahasiswa->mahasiswa = $request->input('tahun');
        $mahasiswa->mahasiswa = $request->input('id_fakultas');
        $mahasiswa->mahasiswa = $request->input('id_jurusan');
        $mahasiswa->save();

        return response()->json($mahasiswa);
    }

    public function show(Request $request)
    {
    	$mahasiswa = mahasiswa::find($nim);

        return response()->json($mahasiswa->toArray());

    }


    public function update(Request $request, $nim)
    {
    	$this->validate($request, [
    		'nama'=>'required',
    		'tempat_lahir'=>'required',
    		'tanggal_lahir'=>'required',
    		'gender'=>'required',
    		'alamat'=>'required',
    		'phone'=>'required',
    		'email'=>'required',
    		'tahun'=>'required',
    		'id_fakultas'=>'required',
    		'id_jurusan'=>'required',]);
    	$mahasiswa = mahasiswa::find($nim);
        $mahasiswa->mahasiswa = $request->input('nama');
        $mahasiswa->mahasiswa = $request->input('tempat_lahir');
        $mahasiswa->mahasiswa = $request->input('tanggal_lahir');
        $mahasiswa->mahasiswa = $request->input('gender');
        $mahasiswa->mahasiswa = $request->input('alamat');
        $mahasiswa->mahasiswa = $request->input('phone');
        $mahasiswa->mahasiswa = $request->input('email');
        $mahasiswa->mahasiswa = $request->input('tahun');
        $mahasiswa->mahasiswa = $request->input('id_fakultas');
        $mahasiswa->mahasiswa = $request->input('id_jurusan');

        $mahasiswa->save();

        return response()->json($mahasiswa->toArray());
    }

    public function destroy($nim)
    {
        $mahasiswa = mahasiswa::find($nim);
        $mahasiswa->delete();

        return response()->json($mahasiswa->toArray());
    }
}
