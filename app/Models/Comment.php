<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'commentable_id', 'commentable_type'];
    // mirph relation 
    public function commentable()
    {
        return $this->morphTo();
    }
}
