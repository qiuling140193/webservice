<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\krs;
use App\mahasiswa;
use App\matakuliah;
use Input;

class krsController extends Controller
{

    /**
     * @SWG\Get(
     *      path="/api/v1/krs",
     *      summary="Retrieves the collection of MediaFile resources.",
     *      produces={"application/json"},
     *      tags={"krs"},
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
        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        
        	$krs = krs::paginate();
            return response()->json($krs->toArray());
        }
    }

        /**    @SWG\Post(
     *      path="/api/v1/krs",
     *      summary="Data krs",
     *      produces={"application/json"},
     *      consumes={"multipart/form-data"},
     *      tags={"krs"},
     *      @SWG\Response(
     *          response=200,
     *          description="Data krs.",
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
     * )
    */
     public function store(Request $request)
    {
             $user=Auth::user();

            if($user->id_level!=3){

                return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

            }
            else{
                $this->validate($request, [
                    'nim'=>'required',
                    'id_matkul'=>'required',
                    ]);
            $krs = new krs();
            $krs->nim = $request->input('nim');
            $krs->id_matkul = $request->input('id_matkul');
            $krs->save();
            return response()->json($krs);
        }
    }

    public function show($id)
    {
    	$krs = krs::find($id);
        return response()->json($krs->toArray());
    }


    public function update(Request $request, $id)
    {
         $user=Auth::user();

        if($user->id_level!=3){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }
        else{
        	$this->validate($request, [
                'nim'=>'required', 
                'id_matkul'=>'required',
                ]);
        	$krs = krs::find($id);
            $krs->nim = $request->input('nim');
            $krs->id_matkul = $request->input('id_matkul');
            $krs->save();
            return response()->json($krs->toArray());
        }
    }

    /**  @SWG\Delete(
     *      path="/api/v1/krs/{id}",
     *      summary="Removes the mediafile resource.",
     *      produces={"application/json"},
     *      tags={"krs"},
     *      @SWG\Response(
     *          response=204,
     *          description="Mediafile resource delete."
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
