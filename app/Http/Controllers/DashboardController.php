<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Model\Pelanggan;
use App\Model\order;
use App\Model\Tukang;

class DashboardController extends Controller
{
    //

    public function index(){
    $pelanggan = Pelanggan::count();
    $pemesanan = order::count();
    $tukang = Tukang::count();
     $chart = Charts::database(Pelanggan::all(),'bar','material')
      ->title('Grafik Jumlah Pelanggan per Bulan')
      ->elementLabel("Jumlah Pelanggan")
      ->dimensions(1000, 500)
      ->responsive(false)
      ->groupByMonth()
      ->monthFormat('F');


    	return View('dashboard.index',compact('chart','pelanggan','pemesanan','tukang'));
    }
}
