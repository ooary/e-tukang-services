<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTukang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tukang',function(Blueprint $table){
            $table->increments('id_tukang');
            $table->integer('id_user')->unsigned();
            $table->string('nama_tukang');
            $table->string('alamat');
            $table->string('no_hp',20);
            $table->string('keahlian');
            $table->string('status');
            $table->string('upah_jasa');
            $table->string('foto')->nullable();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->timestamps();
            

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
        Schema::dropIfExists('tukang');
    }
}
