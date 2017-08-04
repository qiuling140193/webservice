<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
     *  @SWG\Definition(
     *      definition="nilai",
     *      @SWG\Property(
     *          property="semester",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="id_dosen",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="id_matkul",
     *          type="integer"
     *      ),
     *      @SWG\Property(
     *          property="id_mahasiswa",
     *          type="integer"
     *      ),
     *      @SWG\Property(
     *          property="absensi",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="tugas",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="uts",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="uas",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="grade",
     *          type="string"
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

class nilai extends Model
{
    protected $fillable = [
        'semester','id_dosen','id_matkul','id_mahasiswa','absensi','tugas','uts','uas','grade'
        ];
        public function dosen(){
            return $this->oneToMany('App\nilai', 'profile');
        }
        public function mahasiswa(){
          return $this->hasOne('App\nilai', 'profile');
    }
}
