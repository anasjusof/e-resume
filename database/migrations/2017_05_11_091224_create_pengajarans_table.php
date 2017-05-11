<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajarans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('kod_kursus');
            $table->string('nama_kursus');
            $table->string('sem');
            $table->string('bil_pelajar');
            $table->string('tahap');
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
        Schema::drop('pengajarans');
    }
}
