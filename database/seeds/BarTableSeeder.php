<?php

use Illuminate\Database\Seeder;

class BarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bars')->insert(array(
        	array('id'=>'1','bar'=>'admin'),
        	array('id'=>'2','bar'=>'dosen'),
        	array('id'=>'3','bar'=>'mahasiswa'),
        	));
    }
}
