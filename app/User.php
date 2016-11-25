<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'email', 'cedula', 'password', 'fecha_nacimiento', 'telefono', 'direccion',
         'twitter', 'instagram', 'talla', 'categoria', 'tipo', 'lugar_id', 'academia_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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

    public function assignRole($name)
    {
        $role = Role::where('name', $name)->get();
        $this->roles()->attach($role);
    }
}
