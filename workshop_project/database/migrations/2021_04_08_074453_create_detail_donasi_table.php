<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailDonasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_donasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('donasi')->unsigned()->default(1);
            $table->string('keterangan',45);
            $table->date('tanggal');
            $table->integer('nominal');
            $table->boolean('konfirmasi');
            $table->integer('donatur')->unsigned()->default(1);
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
        Schema::dropIfExists('detail_donasi');
    }
}
