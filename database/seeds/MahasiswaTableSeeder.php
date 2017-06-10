<?php

use Illuminate\Database\Seeder;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('mahasiswas')->insert(array(
        	array('nim'=>'1','nama'=>'eko','tempat_lahir'=>'medan','tanggal_lahir'=>'19940125','gender'=>'pria','alamat'=>'jalan sutomo no94','phone'=>'0812561566','email'=>'eko@gmail.com','tahun'=>'2016','id_fakultas'=>'1','id_jurusan'=>'2'),
        	array('nim'=>'2','nama'=>'yunita','tempat_lahir'=>'medan','tanggal_lahir'=>'19950225','gender'=>'wanita','alamat'=>'jalan bangka no 101','phone'=>'0822636566','email'=>'yunita@gmail.com','tahun'=>'2016','id_fakultas'=>'3','id_jurusan'=>'4'),
        	));
    }
}
