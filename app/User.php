<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id_level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
        if($this->id_level == 1){
            return $this->hasOne('App\admin');
        }
        else if($this->id_level == 2){
            return $this->belongsTo('App\dosen');
        }
        else {
            return $this->hasOne('App\mahasiswa');
        }
    }
}
