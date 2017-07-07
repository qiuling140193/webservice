<?php

use Illuminate\Database\Seeder;

class DosenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('dosens')->insert(array(
        	array('nid'=>'1','nama'=>'sungai','tempat_lahir'=>'jakarta','tanggal_lahir'=>'19810307','gender'=>'pria','phone'=>'02315666','email'=>'gunung@gmail.com'),
        	array('nid'=>'2','nama'=>'mutia','tempat_lahir'=>'medan','tanggal_lahir'=>'19891225','gender'=>'wanita','phone'=>'0812267666','email'=>'sucig@gmail.com'),
        	));
    }
}
