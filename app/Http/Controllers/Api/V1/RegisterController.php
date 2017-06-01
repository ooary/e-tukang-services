<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Pelanggan;
use App\Model\Tukang;

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

    protected $rulesTukang =  ['email'=>'required|unique:users|email',
                               'password'=>'required',
                               'nama_tukang'=>'required',
                               'alamat'=>'required',
                                // 'tgl_lahir'=>'required',
                               'no_hp'=>'required',
                               'keahlian'=>'required'];

    public function storeCustomer(Request $request){

    	$errors = Validator::make($request->all(),$this->rules);

    	if($errors->fails()){
    		return Response()->json(['errors'=>$errors->messages()->toArray(),
    								 'Status'=>422]);
    	}

    	$data = $request->except('password');
        /**
         *
         * STORE USER 
         *
         */
        $storeUserTable = new User;
        $storeUserTable->role= "pelanggan";
        $storeUserTable->email= $request->get('email');
        $storeUserTable->password = bcrypt($request->get('password'));
        $storeUserTable->save();
        $data['id_user'] = $storeUserTable->id;
        $storePelanggan = Pelanggan::create($data);
    	// $data['password'] = bcrypt($request->get('password'));
    	// $data['role']='pelanggan';
        //    dd($data);

    	// $storeUserTable = User::create(['role'=>"pelanggan",
        //                                    'email'=>$request->get('email'),
        //                                     'password'=>bcrypt($request->get('password'))]);
    	// $storeUserTable->pelanggan()->create($data);

    	return Response()->json(['status'=>200]);
    }
    
    public function storeTukang(Request $request){
        $errors = Validator::make($request->all(),$this->rulesTukang);

        if($errors->fails()){

            return Response()->json(['errors'=>$errors->messages()->toArray(),
                                     'Status'=>422]);
        }
        $data = $request->except('password');
   
        // $data['password'] = bcrypt($request->get('password'));
        // $data['role']='pelanggan';
        //    dd($data);
        $storeUserTable = new User;
        $storeUserTable->role= "tukang";
        $storeUserTable->email= $request->get('email');
        $storeUserTable->password = bcrypt($request->get('password'));
        $storeUserTable->save();


        // $storeUserTable->save();
        // $storeUserTable = User::create(['role'=>"tukang",
        //                                 'email'=>$request->get('email'),
        //                                  'password'=>bcrypt($request->get('password'))]);
        /**
         *
         * TUKANG
         *
         */
         $data['status']= "aktif";
        // dd($storeUserTable->tukang());
        $data['id_user'] = $storeUserTable->id;
        $storeTukang = Tukang::create($data);
        return Response()->json(['status'=>200]);
    }

}
