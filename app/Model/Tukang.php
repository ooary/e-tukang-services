<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tukang extends Model
{
    protected $table = 'tukang';  
	protected $primaryKey = 'id_tukang';
    protected $fillable = ['id_tukang',
							'id_user',
							'nama_tukang',
							'alamat',
							'no_hp',
							'keahlian',
							'status',
							'upah_jasa',
							'status_aktif',
							'topup',
							'foto'];
	protected $appends = ['jumlah'];
    /**
	 *
	 * RELATION 
	 *
	 */
	
	public function user(){
		return $this->belongsTo('App\Model\User','id_user');
		
	}

	public function orders(){
		return $this->hasMany('App\Model\Order','id_tukang');
	}

	public function getJumlahAttribute(){
		return $this->orders()->where('status_pemesanan','selesai')->count();
	}
}
