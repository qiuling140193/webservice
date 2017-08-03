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
    * @SWG\Post(
    *      path="/api/user",
    *      summary="Data User",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"User"},
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
    *          name="Data User",
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/user/{id}",
     *      summary="Retrieves the collection of User resources.",
     *      produces={"application/json"},
     *      tags={"User"},
     *      @SWG\Response(
     *          response=200,
     *          description="Usser collection.",
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
     * @SWG\Put(
    *      path="/api/v1/user/{id}",
    *      summary="Data User",
    *      produces={"application/json"},
    *      consumes={"application/json"},
    *      tags={"User"},
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
    *          name="Data User",
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
