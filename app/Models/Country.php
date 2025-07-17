<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function cities()
    {
        return $this->hasManyThrough(
            City::class,
            State::class,
            'country_id',
            'state_id',
            'id',
            'id'
        );
    }
}
