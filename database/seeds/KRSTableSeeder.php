<?php

use Illuminate\Database\Seeder;

class KRSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('krs')->insert(array(
        	array('id'=>'1','id_mahasiswa'=>'3001','id_matkul'=>'1'),
        	array('id'=>'2','id_mahasiswa'=>'3001','id_matkul'=>'2'),
        	array('id'=>'3','id_mahasiswa'=>'3001','id_matkul'=>'3'),
        	array('id'=>'4','id_mahasiswa'=>'3001','id_matkul'=>'4'),
        	));
    }
}
