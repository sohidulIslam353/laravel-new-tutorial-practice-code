<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'description'];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
