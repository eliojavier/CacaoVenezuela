<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function participants()
    {
        return $this->hasMany(User::class);
    }
}
