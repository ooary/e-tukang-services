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
		$dataTukang = Tukang::all();

		return Response()->json(['status'=>200,
								 'dataTukang'=>$dataTukang]);
	}
}
