<?php

namespace App\Http\Controllers;

use App\Http\Requests\JudgeRequest;
use App\Judge;
use App\Recipe;
use App\Vote;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests;
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
        $judges = Judge::all();
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
        try{
            Judge::create($request->all());
            flash('Juez agregado exitosamente', 'success');
            return redirect ('admin/jueces');
        }
        catch(QueryException $e){
            return $e->getMessage();
        }
        catch(PDOException $e){
            return $e->getMessage();
        }
        catch(Exception $e){
            return $e->getMessage();
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
        $judge = Judge::findOrFail($id);
        return view('admin.judges.edit', compact('judge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param JudgeRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(JudgeRequest $request, $id)
    {

        $judge = Judge::findOrFail($id);
        $judge->update($request->all());
        flash('Juez actualizado exitosamente', 'success');
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
}
