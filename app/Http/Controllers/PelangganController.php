<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pelanggan;
use App\Model\User;
class PelangganController extends Controller
{
    //
    public function index(Request $request){
    	$data = Pelanggan::all();
    	return View('pelanggan.index',compact('data'));
    }

     public function destroy(Request $request,$id){
    	$data = Pelanggan::findOrfail($id);

    	$user = User::where('id_user',$data->id_user)->delete();
 
    	Alert()->success(strtoupper($data->nama_pelanggan),'Berhasil di Hapus');
        return Redirect('pelanggan');

    }
}
