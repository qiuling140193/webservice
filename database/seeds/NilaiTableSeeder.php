<?php

use Illuminate\Database\Seeder;

class NilaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nilais')->insert(array(
        	array('id'=>'1','semester'=>'1','nid'=>'1','id_matkul'=>'1','nim'=>'1','absensi'=>'100','tugas'=>'100','uts'=>'100','uas'=>'100','grade'=>'A'),
        	array('id'=>'2','semester'=>'1','nid'=>'2','id_matkul'=>'2','nim'=>'1','absensi'=>'80','tugas'=>'85','uts'=>'85','uas'=>'85','grade'=>'B+'),
        	array('id'=>'3','semester'=>'1','nid'=>'1','id_matkul'=>'3','nim'=>'1','absensi'=>'80','tugas'=>'85','uts'=>'90','uas'=>'90','grade'=>'A-'),
        	array('id'=>'4','semester'=>'1','nid'=>'2','id_matkul'=>'4','nim'=>'1','absensi'=>'80','tugas'=>'85','uts'=>'100','uas'=>'100','grade'=>'A'),
        	array('id'=>'5','semester'=>'1','nid'=>'1','id_matkul'=>'5','nim'=>'1','absensi'=>'80','tugas'=>'85','uts'=>'100','uas'=>'100','grade'=>'B-'),
        	array('id'=>'6','semester'=>'1','nid'=>'1','id_matkul'=>'1','nim'=>'2','absensi'=>'100','tugas'=>'100','uts'=>'100','uas'=>'100','grade'=>'A'),
        	array('id'=>'7','semester'=>'1','nid'=>'2','id_matkul'=>'2','nim'=>'2','absensi'=>'80','tugas'=>'85','uts'=>'100','uas'=>'100','grade'=>'A'),
        	array('id'=>'8','semester'=>'1','nid'=>'1','id_matkul'=>'3','nim'=>'2','absensi'=>'80','tugas'=>'85','uts'=>'100','uas'=>'100','grade'=>'A'),
        	array('id'=>'9','semester'=>'1','nid'=>'2','id_matkul'=>'4','nim'=>'2','absensi'=>'80','tugas'=>'85','uts'=>'100','uas'=>'100','grade'=>'A'),
        	array('id'=>'10','semester'=>'1','nid'=>'1','id_matkul'=>'5','nim'=>'2','absensi'=>'80','tugas'=>'85','uts'=>'100','uas'=>'100','grade'=>'A'),
        	));
    }
}
