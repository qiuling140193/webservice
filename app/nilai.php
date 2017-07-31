<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
     *  @SWG\Definition(
     *      definition="jurusan",
     *      @SWG\Property(
     *          property="semester",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="nid",
     *          type="string"
     *      ),
     *      @SWG\Property(
     *          property="id_matkul",
     *          type="integer"
     *      ),
     *      @SWG\Property(
     *          property="nim",
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

class nilai extends Model
{
    protected $fillable = [
        'semester','nid','id_matkul','nim','absensi','tugas','uts','uas','grade'
        ];
}
