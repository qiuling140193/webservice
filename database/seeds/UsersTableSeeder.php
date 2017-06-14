<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
        	array('id'=>'1','name'=>'gunung','email'=>'gunung@gmail.com','password'=>bcrypt('000000'),'id_level'=>'1'),
        	array('id'=>'2','name'=>'suci','email'=>'suci@gmail.com','password'=>bcrypt('000000'),'id_level'=>'1'),
        	array('id'=>'3','name'=>'sungai','email'=>'sungai@gmail.com','password'=>bcrypt('000000'),'id_level'=>'2'),
        	array('id'=>'4','name'=>'mutia','email'=>'mutia@gmail.com','password'=>bcrypt('000000'),'id_level'=>'2'),
        	array('id'=>'5','name'=>'eko','email'=>'eko@gmail.com','password'=>bcrypt('000000'),'id_level'=>'3'),
        	array('id'=>'6','name'=>'yunita','email'=>'yunita@gmail.com','password'=>bcrypt('000000'),'id_level'=>'3'),
        	));
    }
}