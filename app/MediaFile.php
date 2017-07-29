<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

	/**
     *  @SWG\Definition(
     *		definition="mediafile",
     *		@SWG\Property(
     *			property="id",
     *			type="integer",
     *			format="int32"
     *		),
     *		@SWG\Property(
     *			property="path",
     *			type="string"
     *		),
     *		@SWG\Property(
     *			property="created_at",
     *			type="string"
     *		),
      *		@SWG\Property(
     *			property="update_at",
     *			type="string"
     *		),
     *	)
     *      
     */

class MediaFile extends Model
{
    public function getPathAttribute($value)
    {
    	return \Storage::url($value);
    }
}
