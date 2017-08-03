<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khs;
use App\mahasiswa;
use App\matakuliah;

class khsController extends Controller
{

    /**
     * @SWG\Get(
     *      path="/api/v1/khs",
     *      summary="Retrieves the collection of KHS resources.",
     *      produces={"application/json"},
     *      tags={"KHS"},
     *      @SWG\Response(
     *          response=200,
     *          description="KHS collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/khs")
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

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        	$khs = khs::paginate(10);
            return response()->json($khs->toArray());
        }
    }


        /**
    * @SWG\Post(
    *      path="/api/v1/khs",
    *      summary="Data KHS",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"KHS"},
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
    *          name="Data KHS",
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

        }
        else{
                $this->validate($request, [
                    'nim'=>'required',
    	    		'id_matkul'=>'required',
    	    		'absensi'=>'required',
    	    		'tugas'=>'required',
    	    		'uts'=>'required',
    	    		'uas'=>'required',
    	    		'grade'=>'required',
                    ]);
            $khs = new khs();
            $khs->nim = $request->input('nim');
            $khs->id_matkul = $request->input('id_matkul');
            $khs->absensi = $request->input('absensi');
            $khs->tugas = $request->input('tugas');
            $khs->uts = $request->input('uts');
            $khs->uas = $request->input('uas');
            $khs->grade = $request->input('grade');
            $khs->save();
            return response()->json($khs);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/khs/{id}",
     *      summary="Retrieves the collection of KHS resources.",
     *      produces={"application/json"},
     *      tags={"KHS"},
     *      @SWG\Response(
     *          response=200,
     *          description="Jurusan collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/khs")
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
        
    	$khs = khs::find($id);
        return response()->json($khs->toArray());
    }
/**
     * @SWG\Put(
    *      path="/api/v1/khs/{id}",
    *      summary="Data KHS",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"KHS"},
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
    *          name="Data KHS",
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
        	$this->validate($request, [
        		'nim'=>'required',
        		'id_matkul'=>'required',
        		'absensi'=>'required',
        		'tugas'=>'required',
        		'uts'=>'required',
        		'uas'=>'required',
        		'grade'=>'required',
                ]);
        	$khs = khs::find($id);
            $khs->nim = $request->input('nim');
            $khs->id_matkul = $request->input('id_matkul');
            $khs->absensi = $request->input('absensi');
            $khs->tugas = $request->input('tugas');
            $khs->uts = $request->input('uts');
            $khs->uas = $request->input('uas');
            $khs->grade = $request->input('grade');
            $khs->save();
            return response()->json($khs->toArray());
        }
    }

    /**  @SWG\Delete(
     *      path="/api/v1/khs/{id}",
     *      summary="Removes the KHS resource.",
     *      produces={"application/json"},
     *      tags={"KHS"},
     *      @SWG\Response(
     *          response=204,
     *          description="KHS resource delete."
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
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
            $khs = khs::find($id);
            $khs->delete();
            return response()->json($khs->toArray());
        }
    }
}
