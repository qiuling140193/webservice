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

        /**    @SWG\Post(
     *      path="/api/v1/khs",
     *      summary="Data khs",
     *      produces={"application/json"},
     *      consumes={"multipart/form-data"},
     *      tags={"khs"},
     *      @SWG\Response(
     *          response=200,
     *          description="Data KHS.",
     *          @SWG\Property(
     *              property="token",
     *              type="string"
     *          )
     *      ),
     *      @SWG\Response(
     *          response=401,
     *          description="Unauthorized action.",
     *      ),  
     *      @SWG\parameter(
     *          name="id",
     *          in="formData",
     *          required=false,
     *          type="integer",
     *          format="int32"
     *      ),
     *     @SWG\parameter(
     *          name="id_mahasiswa",
     *          in="formData",
     *          required=true,
     *          type="integer"
     *      ),
     *     @SWG\parameter(
     *          name="id_matkul",
     *          in="formData",
     *          required=true,
     *          type="integer"
     *      ),
     *      @SWG\parameter(
     *          name="absensi",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="tugas",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="uts",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="uas",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="grade",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
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

    public function show($id)
    {
        
    	$khs = khs::find($id);
        return response()->json($khs->toArray());
    }


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
