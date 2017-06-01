<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Tukang;
class OrdersController extends Controller
{
    //

    public function doOrder(Request $request){

    	$data = $request->all();

    	if($request->hasFile('photo')){
    		$fileName = $file->getClientOriginalName();
       	    $path     = public_path() . DIRECTORY_SEPARATOR . 'kerusakan';
   	     	$file ->move($path,$fileName);
    		$data['foto']=$fileName;

    	}
    	/**
    	 *
    	 * Biaya fix
    	 *
    	 */
    	$costTukang = Tukang::select('upah_jasa')->where('id_tukang',$request->get('id_tukang'))->first();
    	$data['total_biaya'] = $costTukang->upah_jasa;
    	//// ========================////////
    	$data['status_pembayaran']='belum di bayar';
    	$data['status_pemesanan']='proses';
    	$data['tgl_order']= date('Y-m-d');
    	$saveOrder = Order::create($data);


    	return Response()->json(['status'=>200]);
    }

    public function cancelOrder(Request $request){
    	$data = $request->all();
   		$cancelOrder = Order::find($data['id_pemesanan']);
   		if(empty($cancelOrder->whos_cancel)){
   			$data['status_pemesanan'] = 'canceled';
   			$data['whos_cancel'] = $data['id_cancel'];
   			$cancelOrder->update($data);

   			return Response()->json(['status'=>200]);

   		}else{
   			return Response()->json(['status'=>200,
   									   'ket'=>'Already Canceled']);
   		}
   		
    }

    public function acceptPayment(Request $request){
    	$data = $request->all();
   		$cancelOrder = Order::find($data['id_pemesanan']);
   		$data['status_pembayaran'] = 'Done';
   		$data['tgl_selesai']= date('Y-m-d');
   		$cancelOrder->update($data);

   		return Response()->json(['status'=>200]);
   		
    }
}
