<?php

use Illuminate\Database\Seeder;

class KHSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('khs')->insert(array(
        	array('id'=>'1','nim'=>'1','id_matkul'=>'1','absensi'=>'100','tugas'=>'100','uts'=>'100','uas'=>'100','grade'=>'A'),
        	array('id'=>'2','nim'=>'1','id_matkul'=>'2','absensi'=>'80','tugas'=>'85','uts'=>'100','uas'=>'100','grade'=>'A'),
        	));
    }
}
