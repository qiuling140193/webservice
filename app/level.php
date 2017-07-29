<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    protected $fillable = [
        'level'
        ];
        public function user()
    {
        return $this->hasMany(User::class);
    }
}
