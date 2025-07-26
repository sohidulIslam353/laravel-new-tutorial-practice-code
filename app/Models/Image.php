<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // asig fillable
    protected $fillable = ['url', 'imageable_id', 'imageable_type'];


    /**
     * Get the parent imageable model (user, blog, etc.).
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
