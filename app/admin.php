<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $fillable = [
        'nama','tempat_lahir','tanggal_lahir','gender','phone','email'
        ];
         public $timestamps=false;
}
