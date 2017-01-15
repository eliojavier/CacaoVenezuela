<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use PDOException;

class AdminRecipeController extends Controller
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
            $recipes = Recipe::has('user')->get();
            return view ('admin.recipes.index', compact('recipes'));
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
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $recipe = Recipe::findOrFail($id);
            $voted = $recipe->votesBySpecificJudge->count();
            return view ('admin.recipes.show', compact('recipe', 'voted'));
        }
        catch(QueryException $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('admin/recetas');
        }
        catch(PDOException $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('admin/recetas');
        }
        catch(Exception $e)
        {
            flash('No pudo completarse la operación', 'danger');
            return redirect('admin/recetas');
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
        if (Auth::user()->hasRole('super_admin'))
        {
            try
            {
                Recipe::destroy($id);
                flash('Receta eliminada exitosamente', 'success');
                return redirect('admin/recetas');
            }
            catch (QueryException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/recetas');
            }
            catch (PDOException $e)
            {
                flash('No pudo completarse la operación', 'danger');
                return redirect('admin/recetas');
            }
            catch (Exception $e)
            {
                flash('No pudo completarse la operación', 'danger');
                flash($e->getMessage(), 'danger');
                return redirect('admin/recetas');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('admin/recetas');
    }

    public function userRecipes($id)
    {
        try
        {
            $user = User::findOrFail($id);
            $recipes = $user->recipes;
            return view ('admin.recipes.index', compact('recipes'));
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
}
