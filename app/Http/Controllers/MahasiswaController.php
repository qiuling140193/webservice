<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mahasiswa;
use Auth;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\fakultas;
use App\jurusan;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/mahasiswa",
     *      summary="Retrieves the collection of Mahasiswa resources.",
     *      produces={"application/json"},
     *      tags={"mahasiswa"},
     *      @SWG\Response(
     *          response=200,
     *          description="Mahasiswa collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/mahasiswa")
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

        if($user->id_level==2){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }elseif ($user->id_level ==1) {

            $mahasiswa = mahasiswa::paginate(10);
            return response()->json($mahasiswa->toArray());

        }elseif ($user->id_level==3){

           $mahasiswa = Auth::user()->profile;

            return $mahasiswa;
        }
        
    	// $mahasiswa = mahasiswa::paginate();
     //    return response()->json($mahasiswa->toArray());
    }

    /**
     * @SWG\Post(
     *      path="/api/v1/mahasiswa",
     *      summary="Data Mahasiswa",
     *      produces={"application/json"},
     *      consumes={"multipart/form-data"},
     *      tags={"Mahasiswa"},
     *      @SWG\Response(
     *          response=200,
     *          description="Data Mahasiswa.",
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
     *          name="nama",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="tempat_lahir",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="tanggal_lahir",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="gender",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="alamat",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="phone",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="email",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="tahun",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="id_fakultas",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="id_jurusan",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\parameter(
     *          name="image",
     *          in="formData",
     *          required=false,
     *          type="file"
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
                    'id'=>'required',
                    'nama'=>'required',
    	    		'tempat_lahir'=>'required',
    	    		'tanggal_lahir'=>'required',
    	    		'gender'=>'required',
    	    		'alamat'=>'required',
    	    		'phone'=>'required',
    	    		'email'=>'required',
    	    		'tahun'=>'required',
    	    		'id_fakultas'=>'required',
    	    		'id_jurusan'=>'required',
                    'image'=>'image|required'
                   ]);
                

                $path = $request->image->store('public');
                $mahasiswa = new mahasiswa();
                $mahasiswa->id = $request->input('id');
                $mahasiswa->nama = $request->input('nama');
                $mahasiswa->tempat_lahir = $request->input('tempat_lahir');
                $mahasiswa->tanggal_lahir = $request->input('tanggal_lahir');
                $mahasiswa->gender = $request->input('gender');
                $mahasiswa->alamat = $request->input('alamat');
                $mahasiswa->phone = $request->input('phone');
                $mahasiswa->email = $request->input('email');
                $mahasiswa->tahun = $request->input('tahun');
                $mahasiswa->id_fakultas = $request->input('id_fakultas');
                $mahasiswa->id_jurusan = $request->input('id_jurusan');
                $mahasiswa->image=$path;
                $mahasiswa->save();
                return response()->json($mahasiswa);
            }
        
    }

    public function show($nim)
    {
    	$mahasiswa = mahasiswa::find($nim);
        return response()->json($mahasiswa->toArray());
    }


    public function update(Request $request, $nim)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
        	$this->validate($request, [
                'id'=>'required',
        		'nama'=>'required',
        		'tempat_lahir'=>'required',
        		'tanggal_lahir'=>'required',
        		'gender'=>'required',
        		'alamat'=>'required',
        		'phone'=>'required',
        		'email'=>'required',
        		'tahun'=>'required',
        		'id_fakultas'=>'required',
        		'id_jurusan'=>'required',
                'image'=>'image|required'
            ]);

            $path = $request->image->store('public');
        	$mahasiswa = mahasiswa::find($id);
            $mahasiswa->id = $request->input('id');
            $mahasiswa->nama = $request->input('nama');
            $mahasiswa->tempat_lahir = $request->input('tempat_lahir');
            $mahasiswa->tanggal_lahir = $request->input('tanggal_lahir');
            $mahasiswa->gender = $request->input('gender');
            $mahasiswa->alamat = $request->input('alamat');
            $mahasiswa->phone = $request->input('phone');
            $mahasiswa->email = $request->input('email');
            $mahasiswa->tahun = $request->input('tahun');
            $mahasiswa->id_fakultas = $request->input('id_fakultas');
            $mahasiswa->id_jurusan = $request->input('id_jurusan');
            $mahasiswa->image=$path;
            $mahasiswa->save();
            return response()->json($mahasiswa->toArray());
        }
    }

    /**
     *  @SWG\Delete(
     *      path="/api/v1/mahasiswa/{id}",
     *      summary="Removes the Mahasiswa resource.",
     *      produces={"application/json"},
     *      tags={"Mahasiswa"},
     *      @SWG\Response(
     *          response=204,
     *          description="Mahasiswa resource delete."
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
    public function destroy($nim)
    {

         $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
            $mahasiswa = mahasiswa::find($nim);
            $mahasiswa->delete();
            return response()->json($mahasiswa->toArray());
        }
    }
}
