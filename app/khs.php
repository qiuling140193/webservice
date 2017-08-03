<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
     *  @SWG\Definition(
     *      definition="khs",
     *      @SWG\Property(
     *          property="nim",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="id_matkul",
     *          type="integer"
     *      ),
     *      @SWG\Property(
     *          property="absensi",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="tugas",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="uts",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="uas",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="grade",
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

class khs extends Model
{
	    protected $fillable = [
        'nim','id_matkul','absensi','tugas','uts','uas','grade'
        ];
}
}
