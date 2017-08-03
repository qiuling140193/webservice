<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

    /**
     *  @SWG\Definition(
     *      definition="fakultas",
     *      @SWG\Property(
     *          property="nama",
     *          type="string"
     *      ), 
     *  )  
     *      
     */

class fakultas extends Model
{
   protected $fillable = [
        'nama'
        ];
}
