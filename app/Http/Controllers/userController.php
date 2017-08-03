<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\level;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/user",
     *      summary="Retrieves the collection of User resources.",
     *      produces={"application/json"},
     *      tags={"User"},
     *      @SWG\Response(
     *          response=200,
     *          description="Users collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/user")
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
        $user=User::paginate(10);
        return response()->json($user->toArray());
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
     *   @SWG\Post(
     *      path="/api/v1/user",
     *      summary="Data User",
     *      produces={"application/json"},
     *      consumes={"multipart/form-data"},
     *      tags={"User"},
     *      @SWG\Response(
     *          response=200,
     *          description="Data User.",
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
     *          name="name",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *     @SWG\parameter(
     *          name="email",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *     @SWG\parameter(
     *          name="password",
     *          in="formData",
     *          required=true,
     *          type="string"
     *      ),
     *     @SWG\parameter(
     *          name="id_level",
     *          in="formData",
     *          required=true,
     *          type="integer"
     *      ),
     *     @SWG\parameter(
     *          name="profile_id",
     *          in="formData",
     *          required=true,
     *          type="integer"
     *      ),
     * )
    */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'id_level'=>'required'
            ]);
        $user = new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->id_level=$request->input('id_level');
        $user->save();
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user->toArray());
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
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'id_level'=>'required'
            ]);
        $user = User::find($id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->id_level=$request->input('id_level');
        $user->save();
        return response()->json($user->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @SWG\Delete(
     *      path="/api/v1/user/{id}",
     *      summary="Removes the User resource.",
     *      produces={"application/json"},
     *      tags={"User"},
     *      @SWG\Response(
     *          response=204,
     *          description="User resource delete."
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
        $user = User::find($id);
        $user->delete();
        return response()->json($user->toArray());
    }
}
