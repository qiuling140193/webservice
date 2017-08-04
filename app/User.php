<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
     *  @SWG\Definition(
     *      definition="user",
     *      @SWG\Property(
     *          property="id",
     *          type="integer",
     *          format="int32"
     *      ),
     *      @SWG\Property(
     *          property="name",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="email",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="password",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="id_level",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="profile_id",
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

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id_level','profile_id'
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
    public function jadwal(){
        return $this->hasMany('App\jdwl');
    }
    public function nilai(){
        return $this->hasMany('App\nilai');
    }
}
