<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $fillable =['id_pemesanan',
						  'id_pelanggan',
						  'id_tukang',
						  'nama_kerusakan',
							'keterangan',
							'foto',
							'long',
							'lat',
							'status_pemesanan',
							'status_pembayaran',
							'tgl_order',
							'tgl_selesai',
							'total_biaya',
                            'whos_cancel'];

    /**
     *
     * RELATION
     *
     */

    public function tukang(){
    	return $this->belongsTo('App\Tukang','id_tukang');
    }
    
    public function pelanggan(){
    	return $this->belongsTo('App\Tukang','id_pelanggan');
    }


}
