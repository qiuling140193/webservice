<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\krs;
use App\mahasiswa;
use App\matakuliah;
use Auth;
use Input;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class krsController extends Controller
{

    /**
     * @SWG\Get(
     *      path="/api/v1/krs",
     *      summary="Retrieves the collection of KRS resources.",
     *      produces={"application/json"},
     *      tags={"KRS"},
     *      @SWG\Response(
     *          response=200,
     *          description="krs collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/krs")
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
        
        	$krs = krs::paginate();
            return response()->json($krs->toArray());
        }
    }

       /**
    * @SWG\Post(
    *      path="/api/v1/krs",
    *      summary="Input Data KRS",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"KRS"},
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
    *          name="Data KRS",
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

            if($user->id_level!=1){

                return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

            }
            else{
                $this->validate($request, [
                    'id_mahasiswa'=>'required',
                    'id_matkul'=>'required',
                    ]);
            $krs = new krs();
            $krs->id_mahasiswa = $request->input('id_mahasiswa');
            $krs->id_matkul = $request->input('id_matkul');
            $krs->save();
            return response()->json($krs);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/krs/{id}",
     *      summary="Retrieves the KRS Data by ID.",
     *      produces={"application/json"},
     *      tags={"KRS"},
     *      @SWG\Response(
     *          response=200,
     *          description="Jurusan collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/krs")
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
    	$krs = krs::find($id);
        return response()->json($krs->toArray());
    }
/**
    * @SWG\Put(
    *      path="/api/v1/krs/{id}",
    *      summary="Update Data KRS",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"KRS"},
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
    *          name="Data KRS",
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

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }
        else{
        	$this->validate($request, [
                'id_mahasiswa'=>'required', 
                'id_matkul'=>'required',
                ]);
        	$krs = krs::find($id);
            $krs->id_mahasiswa = $request->input('id_mahasiswa');
            $krs->id_matkul = $request->input('id_matkul');
            $krs->save();
            return response()->json($krs->toArray());
        }
    }

    /**  @SWG\Delete(
     *      path="/api/v1/krs/{id}",
     *      summary="Removes the KRS resource.",
     *      produces={"application/json"},
     *      tags={"KRS"},
     *      @SWG\Response(
     *          response=204,
     *          description="KRS resource delete."
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
            $krs = krs::find($id);
            $krs->delete();
            return response()->json($krs->toArray());
        }
    }
}
