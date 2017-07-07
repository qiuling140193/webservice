<?php

use Illuminate\Database\Seeder;

class jadwalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jdwls')->insert(array(
        	array('id'=>'1','semester'=>'1','hari'=>'senin','id_jurusan'=>'1','id_dosen'=>'1','id_kelas'=>'1','id_jam'=>'1','id_matakuliah'=>'1'),
        	array('id'=>'2','semester'=>'1','hari'=>'selasa','id_dosen'=>'2','id_jurusan'=>'1','id_kelas'=>'2','id_jam'=>'1','id_matakuliah'=>'2'),
        	array('id'=>'3','semester'=>'1','hari'=>'rabu','id_dosen'=>'1','id_jurusan'=>'1','id_kelas'=>'3','id_jam'=>'1','id_matakuliah'=>'3'),
        	array('id'=>'4','semester'=>'1','hari'=>'kamis','id_dosen'=>'2','id_jurusan'=>'1','id_kelas'=>'2','id_jam'=>'1','id_matakuliah'=>'4'),
        	array('id'=>'5','semester'=>'1','hari'=>'jumat','id_dosen'=>'1','id_jurusan'=>'1','id_kelas'=>'1','id_jam'=>'1','id_matakuliah'=>'5'),
        	));
    }
}
