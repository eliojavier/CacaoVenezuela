<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Recipe extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'modality', 'directions', 'serves', 'image', 'user_id'];

    protected $dates = ['deleted_at'];

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

    public function users()
    {
        return $this->belongsToMany(User::class,'votes');
    }

    public function votesBySpecificJudge()
    {
        $user = Auth::user();
        return $this->hasMany(Vote::class)->where('user_id', $user->id);
    }
}
