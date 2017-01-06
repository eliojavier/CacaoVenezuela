<?php

namespace App\Http\Controllers;

use App\Academy;
use App\City;
use App\Role;
use App\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use PDOException;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = User::all();
        $participants = Role::where('name', 'participant')->first()->users()->get();
        return view ('admin.participants.index', compact('participants'));
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
        $participant = User::findOrFail($id);
        return view ('admin.participants.show', compact('participant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participant = User::findOrFail($id);

        $cities = City::pluck('name', 'id');
        $cities->prepend('Seleccione una ciudad', '');

        $academies = Academy::pluck('name', 'id');
        $academies->prepend('N/A', 'N/A');
        $academies->prepend('Seleccione una academia', '');

        $sizes = array
        (''=> 'Seleccione una talla',
            'SS' => 'SS',
            'S' => 'S',
            'M' => 'M',
            'L' => 'L',
            'XL' => 'XL',
            'XXL' => 'XXL',
            'Otro' => 'Otro');

        $categories = array
        (''=> 'Seleccione una categoría',
            'Aficionado/Público General' => 'Aficionado/Público General',
            'Estudiante/Profesional' => 'Estudiante/Profesional');

        $types = array
        (''=> 'Seleccione un tipo',
            'N/A'=>'N/A',
            'Oficiante' => 'Oficiante',
            'Estudiante en curso' => 'Estudiante en curso',
            'Egresado' => 'Egresado');

        return view ('admin.participants.edit', compact('participant', 'cities', 'academies', 'sizes', 'categories', 'types'));
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
        flash('Participante actualizado exitosamente', 'success');
        return redirect('admin/participantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        flash('Participante eliminado exitosamente', 'success');
        return redirect('admin/participantes');
    }
}
