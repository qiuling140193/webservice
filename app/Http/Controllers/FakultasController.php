<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fakultas;
use Auth;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class FakultasController extends Controller
{
    /**
     * @SWG\Get(
     *      path="/api/v1/fakultas",
     *      summary="Retrieves the collection of Fakultas resources.",
     *      produces={"application/json"},
     *      tags={"Fakultas"},
     *      @SWG\Response(
     *          response=200,
     *          description="Fakultas collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/fakultas")
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
        	$fakultas = fakultas::get();
        	
            return response()->json($fakultas->toArray());
        }
    	$fakultas = fakultas::paginate();
        return response()->json($fakultas->toArray());
    }
    /**
    * @SWG\Post(
    *      path="/api/v1/fakultas",
    *      summary="Input Data Fakultas",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"Fakultas"},
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
    *          name="Data Fakultas",
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
                        ]);
                } catch(\Exception $e) {
                    throw new Exception("Salah"); 
                    } 

                $fakultas = new fakultas();

                $fakultas->nama = $request->input('nama');
                $fakultas->save();

                return response()->json($fakultas);
            }
        }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/fakultas/{id}",
     *      summary="Retrieves the Fakultas Data by ID.",
     *      produces={"application/json"},
     *      tags={"Fakultas"},
     *      @SWG\Response(
     *          response=200,
     *          description="Fakultas collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/dosen")
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
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        	$fakultas = fakultas::find($id);

            return response()->json($fakultas->toArray());
        }   
    }
 /**
     * @SWG\Put(
    *      path="/api/v1/fakultas/{id}",
    *      summary="Update Data Fakultas",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"Fakultas"},
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
    *          name="Data fakultas",
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
        	$this->validate($request, ['nama'=>'required',]);
            $fakultas = fakultas::find($id);
            $fakultas->nama = $request->input('nama');


            $fakultas->save();

            return response()->json($fakultas->toArray());
        }
    }

/**  @SWG\Delete(
     *      path="/api/v1/fakultas/{id}",
     *      summary="Removes the Fakultas resource.",
     *      produces={"application/json"},
     *      tags={"Fakultas"},
     *      @SWG\Response(
     *          response=204,
     *          description="Fakultas resource delete."
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
     *      @SWG\Parameter(
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
            $fakultas = fakultas::find($id);
            $fakultas->delete();

            return response()->json($fakultas->toArray());
        }

    }
}
