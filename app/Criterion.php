<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Criterion extends Model
{
    use SoftDeletes;
    
    protected $fillable=['phase', 'criterion'];
    
    protected $dates = ['deleted_at'];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
