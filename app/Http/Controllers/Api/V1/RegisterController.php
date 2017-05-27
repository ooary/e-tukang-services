<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Validator;
class RegisterController extends Controller
{
    //
	protected $rules = ['email'=>'required|unique:users|email',
						'password'=>'required',
						'nama_pelanggan'=>'required',
						'alamat'=>'required',
						// 'tgl_lahir'=>'required',
						 'no_hp'=>'required'];


    public function storeCustomer(Request $request){

    	$errors = Validator::make($request->all(),$this->rules);

    	if($errors->fails()){
    		return Response()->json(['errors'=>$errors->messages()->toArray(),
    								 'Status'=>422]);
    	}

    	$data = $request->all();
    	$data['password'] = bcrypt($data['password']);
    	$data['role']='pelanggan';
    	$storeUserTable = User::create($data);
    	$storeUserTable->pelanggan()->create($data);

    	return Response()->json(['status'=>200]);
    }


}
