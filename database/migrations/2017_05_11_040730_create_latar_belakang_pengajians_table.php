<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLatarBelakangPengajiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latar_belakang_pengajians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('institusi');
            $table->string('tahap_kelulusan');
            $table->string('nama_kelulusan');
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
        Schema::drop('latar_belakang_pengajians');
    }
}
