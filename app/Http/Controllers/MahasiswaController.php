<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mahasiswa;
use Auth;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

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
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->tempat_lahir = $request->input('tempat_lahir');
        $mahasiswa->tanggal_lahir = $request->input('tanggal_lahir');
        $mahasiswa->gender = $request->input('gender');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->phone = $request->input('phone');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->tahun = $request->input('tahun');
        $mahasiswa->id_fakultas = $request->input('id_fakultas');
        $mahasiswa->id_jurusan = $request->input('id_jurusan');
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
    		'id_jurusan'=>'required',
        ]);
    	$mahasiswa = mahasiswa::find($nim);
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->tempat_lahir = $request->input('tempat_lahir');
        $mahasiswa->tanggal_lahir = $request->input('tanggal_lahir');
        $mahasiswa->gender = $request->input('gender');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->phone = $request->input('phone');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->tahun = $request->input('tahun');
        $mahasiswa->id_fakultas = $request->input('id_fakultas');
        $mahasiswa->id_jurusan = $request->input('id_jurusan');
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
