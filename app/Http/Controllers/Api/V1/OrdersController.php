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
      $file = $request->input('foto');
    	if(!empty($file)){
            
        //https://stackoverflow.com/questions/42246478/image-is-not-uploading-to-server-using-laravel-api-while-working-with-core-php-a
        $decodedImage = base64_decode($file);
    
        //  $base64_str = substr($file, strpos($file, ",")+1);
        //  $fileDecode = base64_decode($base64_str);
        //  dd($base64_str);
     
        // $fileEncode = base64_encode($file);

        // dd($fileEncode);
        // $fileBase64 = base64_decode($fileEncode);

    		$fileName = 'uploaded'.rand(1,100).'.'.'jpg';
       	$path     = public_path() . DIRECTORY_SEPARATOR . 'kerusakan/'.$fileName;

        file_put_contents($path,$decodedImage);
   	    // $filebase ->move($path,$fileName);
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

    public function myOrder(Request $request){
      /**
      
        TODO:
        - RENCANA MAKE METHOD GET
        - TRY WITH POST METHOD
        - LOAD SEMUA DI AWAL
        - OPSI KEDUA LOAD SEPERLUNYA
      
       */
      //https://stackoverflow.com/questions/19852927/get-specific-columns-using-with-function-in-laravel-eloquent
      $payload = Order::with('tukang')->where('id_pelanggan',$request->id_pelanggan)->get();

      return Response()->json(['order'=>$payload]);

 
    }
}
