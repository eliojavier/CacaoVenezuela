<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Judge extends Model
{
    protected $fillable=['name', 'email', 'phone'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
