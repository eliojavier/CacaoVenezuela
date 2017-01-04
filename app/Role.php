<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laratrust\LaratrustRole;

class Role extends LaratrustRole
{
    use SoftDeletes;

    protected $fillable = ['name', 'display_name', 'description'];

    protected $dates = ['deleted_at'];
}
