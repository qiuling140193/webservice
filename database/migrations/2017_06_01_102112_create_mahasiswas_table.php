<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('gender');
            $table->longText('alamat');
            $table->string('phone');
            $table->string('email');
            $table->string('tahun');
            $table->integer('id_fakultas')->unsigned();
            $table->foreign('id_fakultas')->references('id')->on('fakultas');
            $table->integer('id_jurusan')->unsigned();
            $table->foreign('id_jurusan')->references('id')->on('jurusans');
            $table->string('image');
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
        Schema::dropIfExists('mahasiswas');
    }
}
