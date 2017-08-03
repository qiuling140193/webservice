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
     *      tags={"MataKuliah"},
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

       /**
    * @SWG\Post(
    *      path="/api/v1/matakuliah",
    *      summary="Data MataKuliah",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"MataKuliah"},
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
    *          name="Data MataKuliah",
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

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/matakuliah/{id}",
     *      summary="Retrieves the collection of MataKuliah resources.",
     *      produces={"application/json"},
     *      tags={"MataKuliah"},
     *      @SWG\Response(
     *          response=200,
     *          description="Jurusan collection.",
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
    	$matakuliah = matakuliah::find($id);
        return response()->json($matakuliah->toArray());

    }

    /**
    * @SWG\Put(
    *      path="/api/v1/matakuliah/{id}",
    *      summary="Data MataKuliah",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"MataKuliah"},
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
     *      tags={"MataKuliah"},
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
