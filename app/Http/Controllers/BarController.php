<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bar;
use Auth;
use App\User;


class BarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user=Auth::user();
        // if($user->id_level!=1){
        //     return response()->json(['error'=>'Forbidden.'], 403);
        // }
        // // dd(Auth::user());
        // $bars=Bar::get();
        // return response()->json($bars->toArray());

        $user = Auth::user();
        if($user->id_level!=1){
        $bars=Bar::get();
        return response()->json($bars->toArray());
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
        // $this->validate($request,[
        //     'bar'=>'required',
        //     ]);
        $bar = new Bar();
        $bar->bar=$request->input('bar');
        $bar->save();
        return response()->json($bar);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bar = Bar::find($id);
        return response()->json($bar->toArray());
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
        $bar = Bar::find($id);
        $bar->bar=$request->input('bar');
        $bar->save();
        return response()->json($bar->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bar = Bar::find($id);
        $bar->delete();
        return response()->json($bar->toArray());
    }
}
