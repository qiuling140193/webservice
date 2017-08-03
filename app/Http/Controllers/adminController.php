<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use Auth;
use App\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class adminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/admin",
     *      summary="Retrieves the collection of Admin resources.",
     *      produces={"application/json"},
     *      tags={"Admin"},
     *      @SWG\Response(
     *          response=200,
     *          description="Admin collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/admin")
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
        // $this->grantIfRole('ROLE_ADMIN','ROLE_USER');
        // $admin=admin::paginate();
        // return response()->json($admin->toArray());

        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.' ,Forbidden'], 403);

        }else {
        $admin=admin::paginate(10);
        return response()->json($admin->toArray());

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @SWG\Post(
     *      path="/api/v1/admin",
     *      summary="Data admin",
     *      produces={"application/json"},
     *      consumes={"multipart/form-data"},
     *      tags={"Admin"},
     *      @SWG\Response(
     *          response=200,
     *          description="Data Admin.",
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
     * )
    */
    public function store(Request $request)
    {
         $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {

        $this->validate($request,[
            'nama'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'email'=>'required'
            ]);
        $admin = new admin();
        $admin->nama=$request->input('nama');
        $admin->tempat_lahir=$request->input('tempat_lahir');
        $admin->tanggal_lahir=$request->input('tanggal_lahir');
        $admin->gender=$request->input('gender');
        $admin->phone=$request->input('phone');
        $admin->email=$request->input('email');
        $admin->save();
        return response()->json($admin);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        $admin = admin::find($id);
        return response()->json($admin->toArray());
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
        $this->validate($request,[
            'nama'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'email'=>'required'
            ]);
        $admin = admin::find($id);
        $admin->nama=$request->input('nama');
        $admin->tempat_lahir=$request->input('tempat_lahir');
        $admin->tanggal_lahir=$request->input('tanggal_lahir');
        $admin->gender=$request->input('gender');
        $admin->phone=$request->input('phone');
        $admin->email=$request->input('email');
        $admin->save();
        return response()->json($admin->toArray());
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     *  @SWG\Delete(
     *      path="/api/v1/admin/{id}",
     *      summary="Removes the Admin resource.",
     *      produces={"application/json"},
     *      tags={"Admin"},
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

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {
            $admin = admin::find($id);
            $admin->delete();
            return response()->json($admin->toArray());
        }
    }
}
