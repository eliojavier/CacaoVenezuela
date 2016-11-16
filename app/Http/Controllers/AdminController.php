<?php

namespace App\Http\Controllers;

use App\Lugar;
use App\Receta;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
        return view ('admin/index');
    }

    public function participantes()
    {
        $participantes = User::all();

        return view ('admin/usuarios/participantes', compact('participantes'));
    }

    public function recetas()
    {
        $recetas = Receta::all();

        return view ('admin/recetas/recetas', compact('recetas'));
    }

    public function participantesPorEstado()
    {
        $usuarios = Lugar::with('usersCountRelation')->get();
        $usuarios->first()->usersCountRelation->count;

        echo($usuarios);
    }
}

// then you can access it like this:



// but there is a bit sugar to make it easier (and that s why I renamed it to sectionsCountRelation)

//public function getSectionsCountAttribute()
//{
//    return $this->sectionsCountRelation->count;
//}
//
//// now you can simply do this on every module:
//$modules->first()->sectionsCount;