<?php

use Illuminate\Database\Seeder;

class MatakuliahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('matakuliahs')->insert(array(
        	array('id'=>'1','nama'=>'Bisnis Administrasi','sks'=>'3'),
        	array('id'=>'2','nama'=>'Ekonomi','sks'=>'4'),
        	array('id'=>'3','nama'=>'Sumber Daya','sks'=>'3'),
        	array('id'=>'4','nama'=>'Strategi Bisnis','sks'=>'3'),
        	array('id'=>'5','nama'=>'Bisnis untuk IT','sks'=>'3'),
        	));
    }
}
