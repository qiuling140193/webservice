<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mahasiswa')->unsigned();
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
            $table->integer('id_matkul')->unsigned();
            $table->foreign('id_matkul')->references('id')->on('matakuliahs');
            $table->string('absensi');
            $table->string('tugas');
            $table->string('uts');
            $table->string('uas');
            $table->string('grade');
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
        Schema::dropIfExists('khs');
    }
}
