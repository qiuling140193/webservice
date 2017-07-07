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
     */
    public function index()
    {
        $user=Auth::user();

        if($user->id_level!=1){

            return response()->json(['error'=>Auth::user()->name.',Forbidden'], 403);

        }else {

        $admin=admin::get();
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
