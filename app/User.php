<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'doc_id', 'password', 'birthday', 'phone', 'address',
         'twitter', 'instagram', 'size', 'category', 'type', 'city_id', 'academy_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at', 'birthday'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function RoleAssignment($name)
    {
        $role = Role::where('name', $name)->get();
        $this->roles()->attach($role);
    }

    public function recipesVoted()
    {
        return $this->belongsToMany(Recipe::class, 'votes');
    }

    public function getFullNameAttribute()
    {
        return $this->name . " " . $this->last_name . " - " . $this->doc_id;
    }

//    public function RoleValidation($user_id)
//    {
//        $user = User::findOrFail($user_id);
//        return $user->roles;
//    }
}
