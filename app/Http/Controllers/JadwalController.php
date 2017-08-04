<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jdwl;
use Auth;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\jurusan;
use App\dosen;
use App\kelas;
use App\matakuliah;
use App\jam;
use App\mahasiswa;

class JadwalController extends Controller
{

    /**
     * @SWG\Get(
     *      path="/api/v1/jadwal",
     *      summary="Retrieves the collection of Jadwal resources.",
     *      produces={"application/json"},
     *      tags={"Jadwal"},
     *      @SWG\Response(
     *          response=200,
     *          description="jadwal collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/jadwal")
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

            $jadwal = jdwl::get();
            return $jadwal;

        }elseif ($user->id_level ==1) {


        	$jadwal = jdwl::paginate(5);

            return response()->json($jadwal->toArray());

        }elseif ($user->id_level==2){

           $jadwal = $user->profile->jadwal;
            return $jadwal;
        }
        else {
            $jadwal = null;
            return $jadwal;
        }


    }


     /**
    * @SWG\Post(
    *      path="/api/v1/jadwal",
    *      summary="Update Data Jadwal",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"Jadwal"},
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
    *          name="Data Jadwal",
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

                $this->validate($request, [
                    'semester'=>'required',
    	    		'hari'=>'required',
    	    		'id_jurusan'=>'required',
    	    		'id_dosen'=>'required',
    	    		'id_kelas'=>'required',
    	    		'id_jam'=>'required',
    	    		'id_matakuliah'=>'required',
                    ]);

            $jadwal = new jdwl();
            $jadwal->semester = $request->input('semester');
            $jadwal->hari = $request->input('hari');
            $jadwal->id_jurusan = $request->input('id_jurusan');
            $jadwal->id_dosen = $request->input('id_dosen');
            $jadwal->id_kelas = $request->input('id_kelas');
            $jadwal->id_jam = $request->input('id_jam');
            $jadwal->id_matakuliah = $request->input('id_matakuliah');
            $jadwal->save();
            
            return response()->json($jadwal->toArray());
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/jadwal/{id}",
     *      summary="Retrieves the Jadwal Data by ID.",
     *      produces={"application/json"},
     *      tags={"Jadwal"},
     *      @SWG\Response(
     *          response=200,
     *          description="Jadwal collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/jadwal")
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
    	$jadwal = jdwl::find($id);
        return response()->json($jadwal->toArray());
    }

    /**
     * @SWG\Put(
    *      path="/api/v1/jadwal/{id}",
    *      summary="Update Data Jadwal",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"Jadwal"},
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
    *          name="Data Jadwal",
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

                $this->validate($request, [
                    'semester'=>'required',
                    'hari'=>'required',
                    'id_jurusan'=>'required',
                    'id_dosen'=>'required',
                    'id_kelas'=>'required',
                    'id_jam'=>'required',
                    'id_matakuliah'=>'required',
                    ]);
           
    	$jadwal = jdwl::find($id);
        $jadwal->semester = $request->input('semester');
            $jadwal->hari = $request->input('hari');
            $jadwal->id_jurusan = $request->input('id_jurusan');
            $jadwal->id_dosen = $request->input('id_dosen');
            $jadwal->id_kelas = $request->input('id_kelas');
            $jadwal->id_jam = $request->input('id_jam');
            $jadwal->id_matakuliah = $request->input('id_matakuliah');
            $jadwal->save();
            
            return response()->json($jadwal->toArray());
        }

    }

    /**  @SWG\Delete(
     *      path="/api/v1/jadwal/{id}",
     *      summary="Removes the Jadwal resource.",
     *      produces={"application/json"},
     *      tags={"Jadwal"},
     *      @SWG\Response(
     *          response=204,
     *          description="Jadwal resource delete."
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
            $jadwal = jdwl::find($id);
            $jadwal->delete();
            return response()->json($jadwal->toArray());
        }
    }
}
