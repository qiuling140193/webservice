<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dosen;
use Auth;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;



class DosenController extends Controller
{
    public function index()

    {   
        $user=Auth::user();

        if($user->id_level==3){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }elseif ($user->id_level ==1) {

            $dosen = dosen::get();

            return response()->json($dosen->toArray());

        }elseif ($user->id_level==2){

           $dosen = dosen::find($id);

            return response()->json($dosen->toArray());
        }
    }

     public function store(Request $request)
    {
        $user=Auth::user();

        if($user->id_level==3){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }elseif ($user->id_level ==1) {

        try{

            $this->validate($request, [
                'nama'=>'required',
	    		'tempat_lahir'=>'required',
	    		'tanggal_lahir'=>'required',
	    		'gender'=>'required',
	    		'phone'=>'required',
	    		'email'=>'required',
                ]);
        $dosen = new dosen();
        $dosen->nama=$request->input('nama');
        $dosen->tempat_lahir=$request->input('tempat_lahir');
        $dosen->tanggal_lahir=$request->input('tanggal_lahir');
        $dosen->gender=$request->input('gender');
        $dosen->phone=$request->input('phone');
        $dosen->email=$request->input('email');
        $dosen->save();
        return response()->json($dosen);
    }elseif ($user->id_level==2){

           $dosen = dosen::find($nid);

            return response()->json($dosen->toArray());
        }
    }

    public function show($nid)
    {
    	$dosen = dosen::find($id);
        return response()->json($dosen->toArray());
    }


    public function update(Request $request, $id)
    {
        $user=Auth::user();

        if($user->id_level==3){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }elseif ($user->id_level ==1) {

        	$this->validate($request, [
        		'nama'=>'required',
        		'tempat_lahir'=>'required',
        		'tanggal_lahir'=>'required',
        		'gender'=>'required',
        		'phone'=>'required',
        		'email'=>'required',
                ]);
        	$dosen = dosen::find($id);
            $dosen->nama = $request->input('nama');
            $dosen->tempat_lahir = $request->input('tempat_lahir');
            $dosen->tanggal_lahir = $request->input('tanggal_lahir');
            $dosen->gender = $request->input('gender');
            $dosen->phone = $request->input('phone');
            $dosen->email = $request->input('email');
            $dosen->save();

            return response()->json($dosen->toArray());
        
        }elseif ($user->id_level==2){

           $dosen = dosen::find($id);

            return response()->json($dosen->toArray());
        }
    }

    public function destroy($id)
    {
        $user=Auth::user();

        if($user->id_level==3){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }elseif ($user->id_level ==1) {

            $dosen = dosen::find($id);
            $dosen->delete();

            return response()->json($dosen->toArray());

        }elseif ($user->id_level==2){

           $dosen = dosen::find($id);

            return response()->json($dosen->toArray());
        }
    }
}
