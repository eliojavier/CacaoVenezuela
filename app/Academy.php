<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    public function participants()
    {
        return $this->hasMany(User::class);
    }
}
