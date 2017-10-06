<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    	'image_thumbnail'
    ];

    public function imageable()
    {
    	return $this->morphTo();
    }
}
