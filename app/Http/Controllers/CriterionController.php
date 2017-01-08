<?php

namespace App\Http\Controllers;

use App\Criterion;
use App\Http\Requests\CriterionRequest;
use App\Vote;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests;
use PDOException;

class CriterionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $criteria = Criterion::orderBy('phase')->get();
            return view ('admin.criteria.index', compact('criteria'));
        }
        catch (QueryException $e) {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin/criterios');
        }
        catch (PDOException $e) {
            flash('Error de conexión a la base de datos', 'danger');
            return redirect('admin/criterios');
        }
        catch (Exception $e) {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin/criterios');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.criteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CriterionRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CriterionRequest $request)
    {
        try{
            Criterion::create($request->all());
            flash('Criterio agregado exitosamente', 'success');
            return redirect ('admin/criterios');
        }
        catch (QueryException $e) {
            flash('Criterio no puede ser agregado', 'danger');
            return redirect('admin/criterios');
        }
        catch (PDOException $e) {
            flash('Error de conexión a la base de datos', 'danger');
            return redirect('admin/criterios');
        }
        catch (Exception $e) {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin/criterios');
        }
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
        $criterion = Criterion::findOrFail($id);
        return view('admin.criteria.edit', compact('criterion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CriterionRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CriterionRequest $request, $id)
    {
        try{
            $criterion = Criterion::findOrFail($id);
            $criterion->update($request->all());
            flash('Criterio actualizado exitosamente', 'success');
            return redirect('admin/criterios');
        }
        catch (QueryException $e) {
            flash('Criterio no puede ser actualizado', 'danger');
            return redirect('admin/criterios');
        }
        catch (PDOException $e) {
            flash('Error de conexión a la base de datos', 'danger');
            return redirect('admin/criterios');
        }
        catch (Exception $e) {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin/criterios');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Criterion $criterion
     * @internal param int $id
     */
    public function destroy($id)
    {
        $votes = Vote::all();
        foreach ($votes as $vote)
        {
            if ($vote->criterion->id == $id)
            {
                flash('Criterio no puede eliminarse', 'danger');
                return redirect('admin/criterios');
            }
        }
        Criterion::destroy($id);
        flash('Criterio eliminado exitosamente', 'success');
        return redirect('admin/criterios');
    }
}
