<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    protected $fillable = [
        'semester','nid','id_matkul','nim','absensi','tugas','uts','uas','grade'
        ];
}
