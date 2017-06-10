<?php

use Illuminate\Database\Seeder;

class FakultasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fakultas')->insert(array(
        	array('id'=>'1','nama'=>'Bussines School'),
        	array('id'=>'2','nama'=>'Ilmu Hukum'),
        	array('id'=>'3','nama'=>'Ilmu Komputer'),
        	));
    }
}
