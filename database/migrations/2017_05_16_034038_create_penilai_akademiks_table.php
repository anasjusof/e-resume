<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaiAkademiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilai_akademiks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('nama');
            $table->string('tajuk_projek');
            $table->string('tahun');
            $table->string('peringkat');
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
        Schema::drop('penilai_akademiks');
    }
}
