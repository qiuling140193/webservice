<?php

use Illuminate\Database\Seeder;

class adminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
        	array('id'=>'1001','nama'=>'gunung','tempat_lahir'=>'medan','tanggal_lahir'=>'19900205','gender'=>'pria','phone'=>'0812555666','email'=>'gunung@gmail.com'),
        	array('id'=>'1002','nama'=>'suci','tempat_lahir'=>'kisaran','tanggal_lahir'=>'19891215','gender'=>'wanita','phone'=>'0812267666','email'=>'sucig@gmail.com'),
        	));
    }
}
