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
   			$data['whos_cancel'] = $data['role'];
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
   		$data['status_pembayaran'] = 'lunas';
   		$data['tgl_selesai']= date('Y-m-d');
      $data['status_pemesanan']='selesai';
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
      $payload = Order::select('id_pemesanan','nama_kerusakan','total_biaya','tgl_order','alamat','status_pemesanan')->where('id_pelanggan',$request->id_pelanggan)->where('whos_cancel',null)->where('status_pemesanan','!=','selesai')->get();

      return Response()->json(['order'=>$payload]);

 
    }

    public function detailOrder(Request $request,$id){

      $payload = Order::where('id_pemesanan',$id)->first();
      $dataTukang = Tukang::select('no_hp')->where('id_tukang',$payload->id_tukang)->first();
      return Response()->json(['order'=>$payload,
                               'tukang'=>$dataTukang]);
    }

    public function myHistory(Request $request){
      $data = $request->all();
      $payload = Order::where('id_pelanggan',$data['id_pelanggan'])->orWhere('status_pemesanan',"canceled")->orWhere('status_pemesanan','selesai')->get();

      return Response()->json(['histories'=>$payload]);
    }

    public function detailHistory(Request $request,$id){
      $payload = Order::where('id_pemesanan',$id)->first();
      return Response()->json($payload);
    }
}
