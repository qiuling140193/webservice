<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jurusan;
use Auth;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class JurusanController extends Controller
{
    /**
     * @SWG\Get(
     *      path="/api/v1/jurusan",
     *      summary="Retrieves the collection of Jurusan resources.",
     *      produces={"application/json"},
     *      tags={"Jurusan"},
     *      @SWG\Response(
     *          response=200,
     *          description="Jurusan collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/jurusan")
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

        	$jurusan = jurusan::paginate();
        	
            return response()->json($jurusan->toArray());
        }
    }


    /**
    * @SWG\Post(
    *      path="/api/v1/jurusan",
    *      summary="Data Jurusan",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"Jurusan"},
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

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {

            try{
                $this->validate($request, [
                    'nama'=>'required',
                    'id_fakultas'=>'required',
                    ]);
            } catch(\Exception $e) {
                throw new Exception("Salah"); 
                } 

            $jurusan = new jurusan();

            $jurusan->nama = $request->input('nama');
            $jurusan->id_fakultas = $request->input('id_fakultas');
            $jurusan->save();
            
            return response()->json($jurusan);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/jurusan/{id}",
     *      summary="Retrieves the collection of Jurusan resources.",
     *      produces={"application/json"},
     *      tags={"Jurusan"},
     *      @SWG\Response(
     *          response=200,
     *          description="Jurusan collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/jurusan")
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
    public function show(Request $request)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        	$jurusan = jurusan::find($id);

            return response()->json($jurusan->toArray());
        }
    }
     /**
     * @SWG\Put(
    *      path="/api/v1/jurusan/{id}",
    *      summary="Data Jurusan",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"Jurusan"},
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

    public function update(Request $request, $id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        	$this->validate($request, ['nama'=>'required','id_fakultas'=>'required',]);
        	$jurusan = jurusan::find($id);
            $jurusan->nama = $request->input('nama');
            $jurusan->id_fakultas = $request->input('id_fakultas');
            $jurusan->save();

            return response()->json($jurusan->toArray());
        }
    }

    /**  @SWG\Delete(
     *      path="/api/v1/jurusan/{id}",
     *      summary="Removes the Jurusan resource.",
     *      produces={"application/json"},
     *      tags={"Jurusan"},
     *      @SWG\Response(
     *          response=204,
     *          description="Jurusan resource delete."
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

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
            $jurusan = jurusan::find($id);
            $jurusan->delete();

            return response()->json($jurusan->toArray());
        }
    }
}
