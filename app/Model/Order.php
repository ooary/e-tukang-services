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
                          'alamat',
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
    	return $this->belongsTo('App\Model\Tukang','id_tukang')->select("id_tukang",
                                                                        "id_user",
                                                                        "nama_tukang",
                                                                         "alamat",
                                                                        "no_hp",
                                                                         "keahlian",
                                                                        "status",
                                                                        "upah_jasa",
                                                                         "foto");
    }
    
    public function pelanggan(){
    	return $this->belongsTo('App\Model\Tukang','id_pelanggan');
    }


}
