<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    protected $fillable=['name', 'email', 'phone'];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
