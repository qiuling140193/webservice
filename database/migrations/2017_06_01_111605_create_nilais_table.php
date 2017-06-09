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
            $table->integer('nid')->unsigned();
            $table->foreign('nid')->references('nid')->on('dosens');
            $table->integer('id_matkul')->unsigned();
            $table->foreign('id_matkul')->references('id')->on('matakuliahs');
            $table->integer('nim')->unsigned();
            $table->foreign('nim')->references('nim')->on('mahasiswas');
            $table->integer('absensi');
            $table->integer('tugas');
            $table->integer('uts');
            $table->integer('uas');
            $table->integer('grade');
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
