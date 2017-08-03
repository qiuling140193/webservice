<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MediaFile;

class MediaFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @SWG\Get(
     *      path="/api/v1/mediafiles",
     *      summary="Retrieves the collection of MediaFile resources.",
     *      produces={"application/json"},
     *      tags={"mediafiles"},
     *      @SWG\Response(
     *          response=200,
     *          description="Mediafiles collection.",
     *          @SWG\Schema(
     *               type="array",
     *               @SWG\Items(ref="#/definitions/mediafile")
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
        $mediafile = MediaFile::paginate();

        // $mediafile->each(function ($mediafile){
        //     $mediafile->path = \Storage::url($mediafile->path);
        // });
        return response()->json($mediafile->toArray());
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
        if($request->hasFile('image')){
            if($request->image->isValid()){
                $path = $request->image->store('public');
                $mediafile= new MediaFile();
                $mediafile->path=$path;
                $mediafile->save();
                // $mediafile->path=\Storage::url($path);
                return response()->json($mediafile);
            }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     *  @SWG\Delete(
     *      path="/api/v1/mediafiles/{id}",
     *      summary="Removes the mediafile resource.",
     *      produces={"application/json"},
     *      tags={"mediafiles"},
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
        //
    }
}
