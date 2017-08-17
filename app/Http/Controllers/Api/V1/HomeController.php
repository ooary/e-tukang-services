<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tukang;
use App\Model\Pelanggan;
use App\Model\Order;
class HomeController extends Controller
{
    //

	public function getTukang(){
		$dataTukang = Tukang::where('status_aktif',0)->where('topup','>',0)->get();
				
		return Response()->json(['status'=>200,
								 'dataTukang'=>$dataTukang]);
	}

	public function getSaldo(Request $request){
		$saldo = Tukang::select('topup')->where('id_tukang',$request->id_tukang)->first();

		return Response()->json(['saldo'=>$saldo]);
	}
}
