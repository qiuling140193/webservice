<?php

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert(array(
        	array('id'=>'1','nama'=>'AD101'),
        	array('id'=>'2','nama'=>'AD102'),
        	array('id'=>'3','nama'=>'LP501'),
        	array('id'=>'4','nama'=>'LP502'),
        	array('id'=>'5','nama'=>'LP503'),
        	));
    }
}
