<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePelanggan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pelanggan',function (Blueprint $table){

            $table->increments('id_pelanggan');
            $table->integer('id_user')->unsigned();
            $table->string('nama_pelanggan');
            $table->text('alamat');
            // $table->date('tgl_lahir');
           // $table->string('jenis_kelamin');
            $table->string('no_hp',20);
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::dropIfExists('pelanggan');
    
    }
}
