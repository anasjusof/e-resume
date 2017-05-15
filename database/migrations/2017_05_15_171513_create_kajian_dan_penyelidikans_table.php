<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKajianDanPenyelidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kajian_dan_penyelidikans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('tajuk');
            $table->string('senarai_penyelidik');
            $table->string('tahun_geran');
            $table->string('sumber');
            $table->string('status');
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
        Schema::drop('kajian_dan_penyelidikans');
    }
}
