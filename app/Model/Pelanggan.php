<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table ='pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $fillable = ['id_pelanggan',
							'id_user',
							'nama_pelanggan',
							'alamat',
							'tgl_lahir',
							//'jenis_kelamin',
							'no_hp'];
	/**
	 *
	 * RELATION 
	 *
	 */
	
	public function user(){
		return $this->belongsTo('App\Model\User','id_user');
		
	}
}
