<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $fillable = [
        'id','nama','tempat_lahir','tanggal_lahir','gender','alamat','phone','email','tahun','id_fakultas','id_jurusan'
        ];

    public function user()
    {
    	return $this->hasOne('App\User', 'profile');
    }

    public function getImageAttribute($value)
    {
    	return \Storage::url($value);
    }
}
