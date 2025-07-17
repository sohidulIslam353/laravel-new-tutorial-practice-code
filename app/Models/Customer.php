<?php

namespace App\Models;

use App\Models\CustomerDetail;
use App\Models\Scopes\OnlyActiveCustomers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'phone', 'email', 'who_created'];


    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }


    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }


    protected static function booted()
    {
        static::addGlobalScope(new OnlyActiveCustomers);
    }

    public function customer_detail(): HasOne
    {
        return $this->hasOne(CustomerDetail::class, 'customer_id', 'id');  // foreignkey , localkey
    }

    // retrive all posts
    public function posts()
    {
        return $this->hasMany(Post::class, 'customer_id', 'id');
    }
}
