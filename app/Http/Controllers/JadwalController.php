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
     *      summary="Retrieves the collection of MediaFile resources.",
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

            $mahasiswa = Auth::jdwl()->profile;
            return $mahasiswa;

        }elseif ($user->id_level ==1) {

        	$jadwal = jdwl::paginate(5);

            return response()->json($jadwal->toArray());

        }elseif ($user->id_level==2){

           $dosen = Auth::jdwl()->profile;

            return $dosen;
        }
    }

     /**    @SWG\Post(
     *      path="/api/v1/jadwal",
     *      summary="Data jadwal",
     *      produces={"application/json"},
     *      consumes={"multipart/form-data"},
     *      tags={"Jadwal"},
     *      @SWG\Response(
     *          response=200,
     *          description="Data jadwal.",
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
     *      @SWG\parameter(
     *          name="semester",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *     @SWG\parameter(
     *          name="hari",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *     @SWG\parameter(
     *          name="id_jurusan",
     *          in="formData",
     *          required=true,
     *          type="integer"
     *      ),
     *     @SWG\parameter(
     *          name="id_dosen",
     *          in="formData",
     *          required=true,
     *          type="integer"
     *      ),
     *     @SWG\parameter(
     *          name="id_kelas",
     *          in="formData",
     *          required=true,
     *          type="integer"
     *      ),
     *     @SWG\parameter(
     *          name="id_jam",
     *          in="formData",
     *          required=true,
     *          type="integer"
     *      ),
     *     @SWG\parameter(
     *          name="id_matakuliah",
     *          in="formData",
     *          required=true,
     *          type="integer"
     *      ),
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

    public function show($id)
    {
    	$jadwal = jdwl::find($id);
        return response()->json($jadwal->toArray());
    }


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
     *      summary="Removes the mediafile resource.",
     *      produces={"application/json"},
     *      tags={"Jadwal"},
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
            if($user->id_level!=1){

                return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

            }else {
            $jadwal = jdwl::find($id);
            $jadwal->delete();
            return response()->json($jadwal->toArray());
        }
    }
}
