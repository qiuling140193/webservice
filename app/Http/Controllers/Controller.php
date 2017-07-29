<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Auth;

/**
* @SWG\Swagger(
*	basePath="",
*	host="webservice.app",
* 	schemes={"http"},
*	@SWG\Info(
*		version="1.0",
*		title="Sample API",
*		@SWG\Contact(
*			name="Sri Wardani",
*			url="https://uph.edu"
*		),
*	),
*	@SWG\Definition(
*		definition="Error",
*		required={"code","message"},
*		@SWG\Property(
*			property="code",
*			type="integer",
*			format="int32"
*		),
*		@SWG\Property(
*			property="message",
*			type="string"
*		)
*	)
* )
*/


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
