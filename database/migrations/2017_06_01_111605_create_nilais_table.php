<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('semester');
            $table->integer('id_dosen')->unsigned();
            $table->foreign('id_dosen')->references('id')->on('dosens');
            $table->integer('id_matkul')->unsigned();
            $table->foreign('id_matkul')->references('id')->on('matakuliahs');
            $table->integer('nim')->unsigned();
            $table->foreign('nim')->references('nim')->on('mahasiswas');
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
        Schema::dropIfExists('nilais');
    }
}
