<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	   protected function grantIfRole(string ...$roles){

	   	$user= Auth::user();
	   	if(!in_array(unserialize($user->roles),$roles)){
	   		return response()->json(['error'=>Auth::user()->name . ',bukan admin'],403);
	   	}
   }
}
