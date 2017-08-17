<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
class OrdersController extends Controller
{
    //
    public function index(Request $request){
    	$data = Order::with('tukang','pelanggan')->get();
    	return View('pemesanan.index',compact('data'));
    }

    public function getMap(Request $request){
    	$payload = Order::select('long','lat')->where('id_pemesanan',$request->id_pemesanan)->first();
    	return View('pemesanan.map',compact('payload'));
    }
}
