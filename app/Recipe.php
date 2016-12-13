<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['name', 'modality', 'directions', 'serves', 'image', 'user_id'];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
