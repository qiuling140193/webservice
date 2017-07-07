<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $fillable = [
        'nama','tempat_lahir','tanggal_lahir','gender','alamat','phone','email','tahun','id_fakultas','id_jurusan'
        ];
}
