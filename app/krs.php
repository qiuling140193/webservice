<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
     *  @SWG\Definition(
     *      definition="krs",
     *      @SWG\Property(
     *          property="nim",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="id_matkul",
     *          type="integer"
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


class krs extends Model
{
     protected $fillable = [
        'nim','id_matkul'
        ];
}
}
