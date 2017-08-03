<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mahasiswa;
use App\nilai;
use App\dosen;
use App\nilai;

class nilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/nilai",
     *      summary="Retrieves the collection of Nilai resources.",
     *      produces={"application/json"},
     *      tags={"Nilai"},
     *      @SWG\Response(
     *          response=200,
     *          description="Nilai collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/nilai")
     *          )
     *      ),
     *      @SWG\Response(
     *          response=401,
     *          description="Unauthorized action.",
     *      ),
     *      @SWG\Parameter(
     *          name="Authorization",
     *          in="header",
     *          required=true,
     *          type="string"
     *      )
     * )
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
    * @SWG\Post(
    *      path="/api/nilai",
    *      summary="Data Nilai",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"Nilai"},
    *      @SWG\Response(
    *          response=200,
    *          description="Users Token.",
    *          @SWG\Property(
    *              property="token",
    *              type="string"
    *          )
    *      ),
    *      @SWG\Response(
    *          response=401,
    *          description="Unauthorized action.",
    *      ),
    *      @SWG\Parameter(
    *          name="Authorization",
    *          in="header",
    *          required=true,
    *          type="string"
    *      ),
    *      @SWG\parameter(
    *          name="Data Jurusan",
    *          in="body",
    *          required=true,
    *          type="string",
    *          @SWG\Schema(
    *              type="string"
    *          )
    *      )
    * )
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/nilai/{id}",
     *      summary="Retrieves the collection of Nilai resources.",
     *      produces={"application/json"},
     *      tags={"Nilai"},
     *      @SWG\Response(
     *          response=200,
     *          description="Nilai collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/nilai")
     *          )
     *      ),
     *      @SWG\Response(
     *          response=401,
     *          description="Unauthorized action.",
     *      ),
     *      @SWG\Parameter(
     *          name="Authorization",
     *          in="header",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          type="integer"
     *      )
     *  )
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
     * @SWG\Put(
    *      path="/api/v1/nilai/{id}",
    *      summary="Data Nilai",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"Nilai"},
    *      @SWG\Response(
    *          response=200,
    *          description="Success Update.",
    *          @SWG\Property(
    *              property="token",
    *              type="string"
    *          )
    *      ),
    *      @SWG\Response(
    *          response=401,
    *          description="Unauthorized action.",
    *      ),
    *      @SWG\Parameter(
    *          name="Authorization",
    *          in="header",
    *          required=true,
    *          type="string"
    *      ),
    *       @SWG\parameter(
    *          name="id",
    *          in="path",
    *          required=true,
    *          type="integer"
    *      ),
    *      @SWG\parameter(
    *          name="Data Nilai",
    *          in="body",
    *          required=true,
    *          type="string",
    *          @SWG\Schema(
    *              type="string"
    *          )
    *      )
    * )
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
     * @SWG\Delete(
     *      path="/api/v1/nilai/{id}",
     *      summary="Removes the Nilai resource.",
     *      produces={"application/json"},
     *      tags={"Nilai"},
     *      @SWG\Response(
     *          response=204,
     *          description="Nilai resource delete."
     *      ),
     *      @SWG\Response(
     *          response=401,
     *          description="Unauthorized Action."
     *      ),
     *      @SWG\Response(
     *          response=404,
     *          description="Resource not found."
     *      ),
     *      @SWG\Parameter(
     *          name="Authorization",
     *          in="header",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          type="integer"
     *      )
     *  )
     */
    public function destroy($id)
    {
        $nilai = nilai::find($id);
        $nilai->delete();
        return response()->json($nilai->toArray());
    }
}
