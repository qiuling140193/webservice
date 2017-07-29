<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dosen;
use Auth;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;



class DosenController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/dosen",
     *      summary="Retrieves the collection of MediaFile resources.",
     *      produces={"application/json"},
     *      tags={"Dosen"},
     *      @SWG\Response(
     *          response=200,
     *          description="Dosen collection.",
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
     *      )
     * )
     */   
    public function index()

    {   
        $user=Auth::user();

        if($user->id_level==3){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }elseif ($user->id_level ==1) {

            $dosen = dosen::paginate(10);

            return response()->json($dosen->toArray());

        }elseif ($user->id_level==2){

           $dosen = Auth::user()->profile;

            return $dosen;
        }
    }
        /**
     * @SWG\Post(
     *      path="/api/v1/dosen",
     *      summary="Data Dosen",
     *      produces={"application/json"},
     *      consumes={"application/json"},
     *      tags={"Dosen"},
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
     *          name="Data Dosen",
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

        }else{

            $this->validate($request, [
                'nama'=>'required',
                'tempat_lahir'=>'required',
                'tanggal_lahir'=>'required',
                'gender'=>'required',
                'phone'=>'required',
                'email'=>'required',
               ]);
            $dosen = new dosen();
            $dosen->nama=$request->input('nama');
            $dosen->tempat_lahir=$request->input('tempat_lahir');
            $dosen->tanggal_lahir=$request->input('tanggal_lahir');
            $dosen->gender=$request->input('gender');
            $dosen->phone=$request->input('phone');
            $dosen->email=$request->input('email');
            $dosen->save();
            return response()->json($dosen);
        }
    }

    public function show($id)
    {
         $user=Auth::user();

        if($user->id_level==3){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }elseif ($user->id_level ==1) {

            $dosen = dosen::find($id);
            return response()->json($dosen->toArray());

        }elseif ($user->id_level==2){

           $dosen = Auth::user()->profile;

            return $dosen;
        }
    }


    public function update(Request $request, $id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else{

        	$this->validate($request, [
        		'nama'=>'required',
        		'tempat_lahir'=>'required',
        		'tanggal_lahir'=>'required',
        		'gender'=>'required',
        		'phone'=>'required',
        		'email'=>'required',
                ]);
        	$dosen = dosen::find($id);
            $dosen->nama = $request->input('nama');
            $dosen->tempat_lahir = $request->input('tempat_lahir');
            $dosen->tanggal_lahir = $request->input('tanggal_lahir');
            $dosen->gender = $request->input('gender');
            $dosen->phone = $request->input('phone');
            $dosen->email = $request->input('email');
            $dosen->save();

            return response()->json($dosen->toArray());
        
        }
    }

    public function destroy($id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else{

            $dosen = dosen::find($id);
            $dosen->delete();

            return response()->json($dosen->toArray());

        }
    }
}
