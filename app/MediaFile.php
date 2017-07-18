<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    public function getPathAttribute($value)
    {
    	return \Storage::url($value);
    }
}
