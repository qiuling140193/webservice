<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mahasiswa;
use Auth;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\fakultas;
use App\jurusan;

class MahasiswaController extends Controller
{
    public function index()
    {
        $user=Auth::user();

        if($user->id_level==2){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }elseif ($user->id_level ==1) {

            $mahasiswa = mahasiswa::paginate();
            // $mahasiswa->image = \Storage::url($mahasiswa->image);
            return response()->json($mahasiswa->toArray());

        }elseif ($user->id_level==3){

           $mahasiswa = Auth::user()->profile;

            return $mahasiswa;
        }
        
    	// $mahasiswa = mahasiswa::paginate();
     //    return response()->json($mahasiswa->toArray());
    }

     public function store(Request $request)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
                    
                $this->validate($request, [
                    'id'=>'required',
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
                    'image'=>'image|required'
                   ]);
                

                $path = $request->image->store('public');
                $mahasiswa = new mahasiswa();
                $mahasiswa->id = $request->input('id');
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
                $mahasiswa->image=$path;
                $mahasiswa->save();
                return response()->json($mahasiswa);
            }
        
    }

    public function show($nim)
    {
    	$mahasiswa = mahasiswa::find($nim);
        return response()->json($mahasiswa->toArray());
    }


    public function update(Request $request, $nim)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
        	$this->validate($request, [
                'id'=>'required',
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
                'image'=>'image|required'
            ]);

            $path = $request->image->store('public');
        	$mahasiswa = mahasiswa::find($id);
            $mahasiswa->id = $request->input('id');
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
            $mahasiswa->image=$path;
            $mahasiswa->save();
            return response()->json($mahasiswa->toArray());
        }
    }

    public function destroy($nim)
    {
         $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
            $mahasiswa = mahasiswa::find($nim);
            $mahasiswa->delete();
            return response()->json($mahasiswa->toArray());
        }
    }
}
