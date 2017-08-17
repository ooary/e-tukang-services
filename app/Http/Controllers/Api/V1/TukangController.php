<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Tukang;
use App\Model\Pelanggan;
use DB;

class TukangController extends Controller
{
    //
    public function getMyOrder(Request $request){
    	$tukang = Tukang::select('id_tukang')->where('id_user',$request->id_user)->first();
    	$data = $request->all();
    	$payload = Order::select('id_pemesanan','nama_kerusakan','total_biaya','tgl_order','alamat','status_pemesanan')
					    	 ->where('id_tukang',$tukang->id_tukang)
					    	 ->where('whos_cancel',null)
					    	 ->where('status_pemesanan','!=','selesai')
					    	 ->get();
    	 return Response()->json(['my_order'=>$payload]);
    }

    public function myOrderHistory(Request $request){
  		$tukang = Tukang::select('id_tukang')->where('id_user',$request->id_user)->first();
      $data = $request->all();
      $payload = Order::select('id_pemesanan','nama_kerusakan','total_biaya','tgl_order','alamat','status_pemesanan')
  					    	 ->where('id_tukang',$tukang->id_tukang)
  					    	 ->where('whos_cancel',null)
  					    	 ->where('status_pemesanan','!=','proses')
                   ->Where('status_pemesanan','!=','sedang menuju ke lokasi')
                   ->orWhere('status_pemesanan','canceled')
  					    	 ->get();
    	 return Response()->json(['my_order'=>$payload]);
    }

    public function detailOrder(Request $request,$id){
      $payload = Order::with('pelanggan')->where('id_pemesanan',$id)->first();
      $dataTukang = Pelanggan::select('no_hp')->where('id_pelanggan',$payload->id_pelanggan)->first();
      return Response()->json(['order'=>$payload,
                               'Pelanggan'=>$dataTukang]);
    }

    public function acceptOrder(Request $request){
      $data = $request->all();
      $cancelOrder = Order::find($data['id_pemesanan']);
      $data['status_pemesanan']='sedang menuju ke lokasi';
      $cancelOrder->update($data);
      $tukang = DB::table('tukang')
                 ->where('id_tukang',$cancelOrder->id_tukang)
                 ->decrement('topup',10000,['status_aktif'=>1]);
      return Response()->json(['status'=>200]);
    }

    public function cancelOrder(Request $request){
      $data = $request->all();
      $cancelOrder = Order::find($data['id_pemesanan']);
      /**
      
        TODO:
        - CHANGE STATUS TUKANG
       */
      $tukang = DB::table('tukang')
         ->where('id_tukang',$cancelOrder->id_tukang)
         ->update(['status_aktif'=>0]);

      $data['status_pemesanan']='canceled';
      $data['whos_cancel']= "tukang";
      $cancelOrder->update($data);
      return Response()->json(['status'=>200]);
    }


}
