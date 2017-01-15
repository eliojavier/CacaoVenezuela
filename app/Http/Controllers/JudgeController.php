<?php

namespace App\Http\Controllers;

use App\Http\Requests\JudgeRequest;
use App\Role;
use App\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDOException;

class JudgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $judges = Role::where('name', 'judge')->first()->users()->get();
            return view ('admin.judges.index', compact('judges'));
        }
        catch(QueryException $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('admin');
        }
        catch(PDOException $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('admin');
        }
        catch(Exception $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('admin');
        }
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
     * @param JudgeRequest $request
     * @return \Illuminate\Http\Response
     * @internal param $ |Request $request
     */
    public function store(JudgeRequest $request)
    {
        if (Auth::user()->hasRole('super_admin'))
        {
            try
            {
                $judge = User::create($request->all());
                $judge->RoleAssignment('judge');
                flash('Juez agregado exitosamente', 'success');
                return redirect ('admin/jueces');
            }
            catch(QueryException $e)
            {
                flash('No pudo ser procesada la solicitud', 'danger');
                return redirect('admin/jueces');
            }
            catch(PDOException $e)
            {
                flash('No pudo ser procesada la solicitud', 'danger');
                return redirect('admin/jueces');
            }
            catch(Exception $e)
            {
                flash('No pudo ser procesada la solicitud', 'danger');
                return redirect('admin/jueces');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('admin/jueces');
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
        if (Auth::user()->hasRole('super_admin'))
        {
            try
            {
                $judge = User::findOrFail($id);
                return view('admin.judges.edit', compact('judge'));
            }
            catch (QueryException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/jueces');
            }
            catch (PDOException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/jueces');
            }
            catch (Exception $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/jueces');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('admin/jueces');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param JudgeRequest|Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param User $judge
     * @internal param User $user
     * @internal param int $id
     */
    public function update(JudgeRequest $request, $id)
    {
        if (Auth::user()->hasRole('super_admin'))
        {
            try
            {
                $judge = User::findOrFail($id);
                $judge->update($request->all());
                flash('Juez actualizado exitosamente', 'success');
                return redirect('admin/jueces');
            }
            catch(QueryException $e)
            {
                flash('Juez no pudo ser actualizado', 'danger');
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062)
                {
                    flash('Correo ya registrado en la base de datos', 'danger');
                }
                return redirect('admin/jueces');
            }
            catch(PDOException $e)
            {
                flash('Juez no pudo ser actualizado', 'danger');
                return redirect('admin/jueces');
            }
            catch(Exception $e)
            {
                flash('Juez no pudo ser actualizado', 'danger');
                return redirect('admin/jueces');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('admin/jueces');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('super_admin'))
        {
            try
            {
                $judge_votes = User::findOrFail($id)->votes()->count();
                if($judge_votes>0)
                {
                    flash('Juez no puede eliminarse debido a que ya ha realizado votaciones', 'danger');
                    return redirect('admin/jueces');
                }
                User::destroy($id);
                flash('Juez eliminado exitosamente', 'success');
                return redirect('admin/jueces');
            }
            catch (QueryException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/jueces');
            }
            catch (PDOException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/jueces');
            }
            catch (Exception $e)
            {
                flash('No pudo completarse la operación', 'danger');
                flash($e->getMessage(), 'danger');
                return redirect('admin/jueces');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('admin/jueces');
    }
}
