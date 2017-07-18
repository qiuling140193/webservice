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
        	array('id'=>'1001','name'=>'gunung','email'=>'gunung@gmail.com','password'=>bcrypt('000000'),'id_level'=>'1','profile_id'=>'1001'),
        	array('id'=>'1002','name'=>'suci','email'=>'suci@gmail.com','password'=>bcrypt('000000'),'id_level'=>'1','profile_id'=>'1002'),
        	array('id'=>'2001','name'=>'sungai','email'=>'sungai@gmail.com','password'=>bcrypt('000000'),'id_level'=>'2','profile_id'=>'2001'),
        	array('id'=>'2002','name'=>'mutia','email'=>'mutia@gmail.com','password'=>bcrypt('000000'),'id_level'=>'2','profile_id'=>'2002'),
        	// array('id'=>'3001','name'=>'eko','email'=>'eko@gmail.com','password'=>bcrypt('000000'),'id_level'=>'3','profile_id'=>'3001'),
        	// array('id'=>'3002','name'=>'yunita','email'=>'yunita@gmail.com','password'=>bcrypt('000000'),'id_level'=>'3','profile_id'=>'3002')
        ));
    }
}
