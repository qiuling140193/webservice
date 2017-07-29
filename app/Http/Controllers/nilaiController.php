<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mahasiswa;
use App\matakuliah;
use App\dosen;
use App\nilai;

class nilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             $user=Auth::user();

            if($user->id_level==3){

                return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

            }elseif ($user->id_level ==1) {

                $nilai=nilai::paginate(10);
                return response()->json($nilai->toArray());

            }elseif ($user->id_level==2){
                // $nilai=nilai::paginate();
                // return response()->json($nilai->toArray());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $user=Auth::user();

        if($user->id_level!=2){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
             $this->validate($request,[
                'semester'=>'required',
                'nid'=>'required',
                'id_matkul'=>'required',
                'nim'=>'required',
                'absensi'=>'required',
                'tugas'=>'required',
                'uts'=>'required',
                'uas'=>'required',
                'grade'=>'required'
                ]);
            $nilai = new nilai();
            $nilai->semester=$request->input('semester');
            $nilai->nid=$request->input('nid');
            $nilai->id_matkul=$request->input('id_matkul');
            $nilai->nim=$request->input('nim');
            $nilai->absensi=$request->input('absensi');
            $nilai->tugas=$request->input('tugas');
            $nilai->uts=$request->input('uts');
            $nilai->uas=$request->input('uas');
            $nilai->grade=$request->input('grade');
            $nilai->save();
            return response()->json($nilai);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nilai = nilai::find($id);
        return response()->json($nilai->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $user=Auth::user();

        if($user->id_level!=2){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
            $this->validate($request,[
                'semester'=>'required',
                'nid'=>'required',
                'id_matkul'=>'required',
                'nim'=>'required',
                'absensi'=>'required',
                'tugas'=>'required',
                'uts'=>'required',
                'uas'=>'required',
                'grade'=>'required'
                ]);
            $nilai = nilai::find($id);
            $nilai->semester=$request->input('semester');
            $nilai->nid=$request->input('nid');
            $nilai->id_matkul=$request->input('id_matkul');
            $nilai->nim=$request->input('nim');
            $nilai->absensi=$request->input('absensi');
            $nilai->tugas=$request->input('tugas');
            $nilai->uts=$request->input('uts');
            $nilai->uas=$request->input('uas');
            $nilai->grade=$request->input('grade');
            $nilai->save();
            return response()->json($nilai->toArray());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = nilai::find($id);
        $nilai->delete();
        return response()->json($nilai->toArray());
    }
}
