<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jdwl extends Model
{
    protected $fillable = [
        'semester','hari','id_jurusan','id_dosen','id_kelas','id_jam','id_matakuliah'
        ];
        public $timestamps=false;
}
