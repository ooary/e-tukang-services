<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tukang;
use Alert;
use Validator;
use App\Model\User;
use File;
class TukangController extends Controller
{
    //


    public function index(Request $request){
    	$data = Tukang::orderBy('created_at','DESC')->get();
    	return View('tukang.index',compact('data'));
    }

    public function create(){
    	return View('tukang.add');
    }

    public function store(Request $request){
        $data = $request->except('password','foto');

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
         $data['status_aktif']= 0;

        // dd($storeUserTable->tukang());
        $data['id_user'] = $storeUserTable->id_user;
        $file = $request->file('foto');
         $fileName = 'uploaded'.rand(1,10000).'.'.'jpg';
         $path     = public_path() . DIRECTORY_SEPARATOR . 'profile';
         $file->move($path,$fileName);
        // $filebase ->move($path,$fileName);
        $data['foto']=$fileName;
        $storeTukang = Tukang::create($data);
        Alert()->success(strtoupper($request->nama_tukang),'Berhasil di Simpan');
        return Redirect('tukang');
    }

    public function destroy(Request $request,$id){
    	$data = Tukang::findOrfail($id);
    	$user = User::where('id_user',$data->id_user)->delete();
    	Alert()->success(strtoupper($data->nama_tukang),'Berhasil di Hapus');
        return Redirect('tukang');

    }

    public function topup($id){
        $data = Tukang::findOrfail($id);

        return View('tukang.topup',compact('data'));
    }

    public function doTopup(Request $request,$id){
        $data = Tukang::findOrfail($id);

        $data->topup += $request->get('topup');
        $data->update();
        Alert()->success(strtoupper($data->nama_tukang.' Topup Saldo'),'Berhasil !');

        return Redirect('tukang');
    }
  
}
