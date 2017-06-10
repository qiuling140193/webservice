<?php

use Illuminate\Database\Seeder;

class JamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jams')->insert(array(
        	array('id'=>'1','jam'=>'09.00 - 12.30'),
        	array('id'=>'2','jam'=>'13.30 - 17.00'),
        	array('id'=>'3','jam'=>'17.30 - 21.00'),
        	));
    }
}
