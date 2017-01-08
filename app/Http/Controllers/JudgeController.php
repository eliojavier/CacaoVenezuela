<?php

namespace App\Http\Controllers;

use App\Http\Requests\JudgeRequest;
use App\Judge;
use App\Recipe;
use App\Role;
use App\User;
use App\Vote;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests;
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
        $judges = Role::where('name', 'judge')->first()->users()->get();
        return view ('admin.judges.index', compact('judges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.judges.create');
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
        if (Auth::user()->hasRole('super_admin')){
            try{
                $judge = User::create($request->all());
                $judge->RoleAssignment('judge');
                flash('Juez agregado exitosamente', 'success');
                return redirect ('admin/jueces');
            }
            catch(QueryException $e){
                flash('Juez no pudo ser agregado', 'danger');
                return redirect('admin/jueces');
            }
            catch(PDOException $e){
                flash('Juez no pudo ser agregado', 'danger');
                return redirect('admin/jueces');
            }
            catch(Exception $e){
                flash('Juez no pudo ser agregado', 'danger');
                return redirect('admin/jueces');
            }
        }
        return redirect('admin');
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
        $judge = User::findOrFail($id);
        return view('admin.judges.edit', compact('judge'));
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
        if (Auth::user()->hasRole('super_admin')) {
            try{
                $judge = User::findOrFail($id);
                $judge->update($request->all());
                flash('Juez actualizado exitosamente', 'success');
                return redirect('admin/jueces');
            }
            catch(QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    flash('Correo ya registrado en la base de datos', 'danger');
                    return redirect('admin/jueces');
                }
            }
            catch(PDOException $e){
                flash('Juez no pudo ser agregado', 'danger');
                return redirect('admin/jueces');
            }
            catch(Exception $e){
                flash('Juez no pudo ser agregado', 'danger');
                return redirect('admin/jueces');
            }
        }

        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $votes = Vote::all();
        foreach ($votes as $vote)
        {
            if ($vote->judge->id == $id)
            {
                flash('Juez no puede eliminarse', 'danger');
                return redirect('admin/jueces');
            }
        }
        
        Judge::destroy($id);
        flash('Juez eliminado exitosamente', 'success');
        return redirect('admin/jueces');
    }

    public function roleAssignment()
    {
        
    }
}
