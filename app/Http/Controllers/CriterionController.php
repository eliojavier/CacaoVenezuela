<?php

namespace App\Http\Controllers;

use App\Criterion;
use App\Http\Requests\CriterionRequest;
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
        $criteria = Criterion::orderBy('phase')->get();
        return view ('admin.criteria.index', compact('criteria'));
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
            return redirect ('admin/criterios');
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
            return redirect ('admin/criterios');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Criterion::destroy($id);
            return redirect ('admin/criterios');
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
}
