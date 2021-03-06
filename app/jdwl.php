<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
     *  @SWG\Definition(
     *      definition="jadwal",
     *      @SWG\Property(
     *          property="nama",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="semester",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="hari",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="id_jurusan",
     *          type="integer"
     *      ),
     *      @SWG\Property(
     *          property="id_dosen",
     *          type="integer"
     *      ),
     *      @SWG\Property(
     *          property="id_jam",
     *          type="integer"
     *      ),
     *      @SWG\Property(
     *          property="id_matakuliah",
     *          type="integer"
     *      ),
     *      @SWG\Property(
     *          property="created_at",
     *          type="string"
     *      ),
      *     @SWG\Property(
     *          property="update_at",
     *          type="string"
     *      ),
     *  )
     *      
     */

class jdwl extends Model
{
    protected $fillable = [
        'semester','hari','id_jurusan','id_dosen','id_kelas','id_jam','id_matakuliah'
        ];
        public $timestamps=false;

        public function dosen(){
            return $this->oneToMany('App\jdwl', 'profile');
        }
        public function mahasiswa(){
           return $this->oneToMany('App\jdwl', 'profile');
        }
}
