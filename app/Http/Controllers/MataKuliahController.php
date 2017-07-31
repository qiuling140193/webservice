<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\matakuliah;


class MataKuliahController extends Controller
{
    /**
     * @SWG\Get(
     *      path="/api/v1/matakuliah",
     *      summary="Retrieves the collection of Mata Kuliah resources.",
     *      produces={"application/json"},
     *      tags={"Matakuliah"},
     *      @SWG\Response(
     *          response=200,
     *          description="Matakuliah collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/matakuliah")
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

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

            }else {
        	$matakuliah = matakuliah::paginate(5);
            return response()->json($matakuliah->toArray());
        }
    }

        /**    @SWG\Post(
     *      path="/api/v1/matakuliah",
     *      summary="Data Matakuliah",
     *      produces={"application/json"},
     *      consumes={"multipart/form-data"},
     *      tags={"matakuliah"},
     *      @SWG\Response(
     *          response=200,
     *          description="Data Matakuliah.",
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
     *          name="nama",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *     @SWG\parameter(
     *          name="sks",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     * )
    */
     public function store(Request $request)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
                $this->validate($request, [
                    'nama'=>'required',
                    'sks'=>'required',
                    ]);

            $matakuliah = new matakuliah();
            $matakuliah->nama = $request->input('nama');
            $matakuliah->sks = $request->input('sks');
            $matakuliah->save();
            return response()->json($matakuliah);
        }
    }

    public function show($id)
    {
    	$matakuliah = matakuliah::find($id);
        return response()->json($matakuliah->toArray());

    }


    public function update(Request $request, $id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
            $this->validate($request, [
                    'nama'=>'required',
                    'sks'=>'required',
                    ]);
        	$matakuliah = matakuliah::find($id);
            $matakuliah->nama = $request->input('nama');
            $matakuliah->sks = $request->input('sks');
            $matakuliah->save();
            return response()->json($matakuliah->toArray());
        }
    }

    /**  @SWG\Delete(
     *      path="/api/v1/matakuliah/{id}",
     *      summary="Removes the Matakuliah resource.",
     *      produces={"application/json"},
     *      tags={"matakuliah"},
     *      @SWG\Response(
     *          response=204,
     *          description="Mata Kuliah resource delete."
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
            $matakuliah = matakuliah::find($id);
            $matakuliah->delete();
            return response()->json($matakuliah->toArray());
        }
    }
}
