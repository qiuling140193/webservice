<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJdwlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jdwls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('semester');
            $table->string('hari');
            $table->integer('id_jurusan')->unsigned();
            $table->foreign('id_jurusan')->references('id')->on('jurusans');
            $table->integer('nid')->unsigned();
            $table->foreign('nid')->references('nid')->on('dosens');
            $table->integer('id_kelas')->unsigned();
            $table->foreign('id_kelas')->references('id')->on('kelas');
            $table->integer('id_jam')->unsigned();
            $table->foreign('id_jam')->references('id')->on('jams');
            $table->integer('id_matakuliah')->unsigned();
            $table->foreign('id_matakuliah')->references('id')->on('matakuliahs');                    
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
        Schema::dropIfExists('jdwls');
    }
}
