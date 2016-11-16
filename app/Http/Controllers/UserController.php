<?php

namespace App\Http\Controllers;

use App\Academia;
use App\Lugar;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $estado = $user->lugar_id;

        $estados = Lugar::pluck('nombre', 'id');
        $academias = Academia::pluck('nombre', 'id');
        $tallas = array
        ('SS' => 'SS',
            'S' => 'S',
            'M' => 'M',
            'L' => 'L',
            'XL' => 'XL',
            'XXL' => 'XXL',
            'Otro' => 'Otro');
        $categorias = array
        ('Aficionado/Público General' => 'Aficionado/Público General',
            'Estudiante/Profesional' => 'Estudiante/Profesional');

        $tipos = array
        ('N/A'=>'N/A',
            'Oficiante' => 'Oficiante',
            'Estudiante en curso' => 'Estudiante en curso',
            'Egresado' => 'Egresado');

        return view ('auth/edit', compact('user', 'estado', 'estados', 'academias', 'tallas', 'categorias', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        //return redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
