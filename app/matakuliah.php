<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
     *  @SWG\Definition(
     *      definition="jurusan",
     *      @SWG\Property(
     *          property="nama",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="sks",
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

class matakuliah extends Model
{
     protected $fillable = [
        'nama','sks'
        ];
}
