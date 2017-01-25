<?php

namespace Robtor\Http\Controllers;

use Illuminate\Http\Request;

use Robtor\Http\Requests;

class ApiAuthController extends Controller
{
    public function userAuth(Request $request){
    	$credentials = $request->only('email', 'password');
    	$token = null;

    	try {
    		if(!$token = JWTAuth::attemp($credentials)){
    			return response()->json(['error' => 'credenciales invalidas']);
    		}
    	} catch (JWTException $ex) {
    		return response()->json(['error' => 'error en server side', 500]);
    	}

    	return response()->json(compact('token'));

    }
}
