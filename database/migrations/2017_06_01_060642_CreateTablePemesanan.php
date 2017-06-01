\<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan',function(Blueprint $table){
            $table->increments('id_pemesanan');
            $table->integer('id_pelanggan')->unsigned();
            $table->integer('id_tukang')->unsigned();
            $table->string('nama_kerusakan');
            $table->string('keterangan');
            $table->string('foto')->nullable();
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
            $table->string('status_pemesanan');
            $table->string('status_pembayaran');
            $table->date('tgl_order');
            $table->date('tgl_selesai')->nullable();
            $table->string('total_biaya');
            $table->integer('whos_cancel')->nullable();
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
            $table->foreign('id_tukang')->references('id_tukang')->on('tukang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('pemesanan');
    }
}
