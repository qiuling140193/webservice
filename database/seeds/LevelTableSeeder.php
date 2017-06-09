<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('levels')->insert(array(
        	array('id'=>'1','level'=>'admin'),
        	array('id'=>'2','level'=>'dosen'),
        	array('id'=>'3','level'=>'mahasiswa'),
        	));
    }
}
