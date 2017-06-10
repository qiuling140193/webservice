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
        	array('id'=>'1','nim'=>'1','id_matkul'=>'1'),
        	array('id'=>'2','nim'=>'1','id_matkul'=>'2'),
        	array('id'=>'3','nim'=>'1','id_matkul'=>'3'),
        	array('id'=>'4','nim'=>'1','id_matkul'=>'4'),
        	));
    }
}
