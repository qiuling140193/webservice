<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
     *  @SWG\Definition(
     *      definition="mahasiswa",
     *      @SWG\Property(
     *          property="id",
     *          type="integer",
     *          format="int32"
     *      ),
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
     *          property="alamat",
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
     *          property="tahun",
     *          type="integer",
     *          format="int32"
     *      ),
     *      @SWG\Property(
     *          property="id_fakultas",
     *          type="integer",
     *          format="int32"
     *      ),
     *      @SWG\Property(
     *          property="id_jurusan",
     *          type="integer",
     *          format="int32"
     *      ),
     *      @SWG\Property(
     *          property="image",
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
