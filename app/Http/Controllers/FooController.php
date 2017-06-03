<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooController extends Controller
{
	public function get(Request $request , int $id)
    {
   
	    $data=[
			[
				'id'=>1,
				'name'=>'foo1',
			],
			[
				'id'=>2,
				'name'=>'foo2',
			]
			];return response()->json($data[$id-1]);
	}
	public function cget(Request $request)
    {
   
	    $data=[
			[
				'id'=>1,
				'name'=>'foo1',
			],
			[
				'id'=>2,
				'name'=>'foo2',
			]
			];return responsse()->json[$data];
	}
	public function delete(Request $request)
    {
   
	    return response()->json([]);
	}
	public function post(Request $request, int $id)
    {
   		
	}
}
