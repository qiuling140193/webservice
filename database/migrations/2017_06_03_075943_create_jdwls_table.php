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
            $table->integer('id_kelas')->unsigned();
            $table->foreign('id_kelas')->references('id')->on('kelas');
            $table->integer('id_fakultas')->unsigned();
            $table->foreign('id_fakultas')->references('id')->on('fakultas');
            $table->integer('id_jam')->unsigned();
            $table->foreign('id_jam')->references('id')->on('jams');
            $table->string('semester');
            $table->string('hari');
            $table->integer('nid')->unsigned();
            $table->foreign('nid')->references('nid')->on('dosens');
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
