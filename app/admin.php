<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
     *  @SWG\Definition(
     *      definition="admin",
     *      @SWG\Property(
     *          property="nama",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="tempat_lahir",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="tanggal_lahir",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="gender",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="phone",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="email",
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


class admin extends Model
{
    protected $fillable = [
        'nama','tempat_lahir','tanggal_lahir','gender','phone','email'
        ];
         public $timestamps=false;

         public function user(){
    	return $this->hasOne('App\User', 'profile');
    }
}
