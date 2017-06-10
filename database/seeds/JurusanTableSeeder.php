<?php

use Illuminate\Database\Seeder;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('jurusans')->insert(array(
        	array('id'=>'1','nama'=>'Management','id_fakultas'=>'1'),
        	array('id'=>'2','nama'=>'Hospitality','id_fakultas'=>'1'),
        	array('id'=>'3','nama'=>'Accounting','id_fakultas'=>'1'),
        	array('id'=>'4','nama'=>'Hukum','id_fakultas'=>'2'),
        	array('id'=>'5','nama'=>'Sistem Informasi','id_fakultas'=>'3'),
        	array('id'=>'6','nama'=>'Teknik Informatika','id_fakultas'=>'3'),
        	));
    }
}
