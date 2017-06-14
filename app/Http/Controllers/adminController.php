<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=admin::get();
        return response()->json($admin->toArray());
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = admin::find($id);
        return response()->json($admin->toArray());
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = admin::find($id);
        $admin->delete();
        return response()->json($admin->toArray());
    }
}
