<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function criterion()
    {
        return $this->belongsTo(Criterion::class);
    }
    
    public function judge()
    {
        return $this->belongsTo(Judge::class);
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
