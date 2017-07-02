<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Auth;
class AuthController extends Controller
{
    public function signIn(Request $request){

		// grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            /**
             *
             * KALO BERHASIL BAKAL KE SIMPEN KE VARIABEL $TOKEN
             *
             */
            
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Email Or Password false'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        // RETURN DATA
        if($request->user()->role =="pelanggan"){
             $pelanggan = $request->user()->pelanggan->toArray();
        }else{
             $pelanggan = $request->user()->tukang->toArray();
        }

        return response()->json(['token'=>$token,
        						  'users'=>Auth::user(),
        						  'status'=>"success"]);
    }
}
