<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    public function getNombreAttribute($value)
    {
        return ucfirst($value);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function usersCountRelation()
    {
        return $this->hasOne(User::class)->selectRaw('lugar_id, count(*) as count')->groupBy('lugar_id');
        // replace module_id with appropriate foreign key if needed
    }

//    Module model
//    public function sectionsCountRelation()
//    {
//        return $this->hasOne('Section')->selectRaw('module_id, count(*) as count')->groupBy('module_id');
//        // replace module_id with appropriate foreign key if needed
//    }

// then you can access it like this:

//$modules = Module::with('sectionsCountRelation')->get();
//$modules->first()->sectionsCountRelation->count;
//
//// but there is a bit sugar to make it easier (and that s why I renamed it to sectionsCountRelation)
//
//    public function getSectionsCountAttribute()
//    {
//        return $this->sectionsCountRelation->count;
//    }
//
//// now you can simply do this on every module:
//$modules->first()->sectionsCount;


}
