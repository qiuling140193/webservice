<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    protected $fillable = [
        'nama','tempat_lahir','tanggal_lahir','gender','phone','email'
        ];


    public function user(){
    	return $this->hasOne('App\User', 'profile');
    }
}
