<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDOException;

class ReportController extends Controller
{
    public function mostUsedIngredients()
    {
        try
        {
            $ingredients_most_used = DB::select(DB::raw('SELECT i.name as ingrediente, COUNT(i.id) AS usos
                                                        FROM ingredients i, ingredient_recipe ir
                                                        WHERE ir.ingredient_id = i.id
                                                        GROUP BY i.name, i.id
                                                        ORDER BY usos DESC '));

            return view('admin.reports.most_used_ingredients', compact('ingredients_most_used'));
        }
        catch(QueryException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
        catch(PDOException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
        catch(Exception $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
    }

    public function numberOfParticipantsByCity()
    {
        try
        {
            $number_of_participants_by_city = DB::select(DB::raw('SELECT c.name AS ciudad, COUNT(c.id) AS participantes
                                                    FROM cities c, users u 
                                                    WHERE u.city_id = c.id
                                                    GROUP BY c.name, c.id
                                                    ORDER BY participantes DESC'));

            return view('admin.reports.participants_by_city', compact('number_of_participants_by_city'));
        }
        catch(QueryException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
        catch(PDOException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
        catch(Exception $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
    }

    public function general()
    {

        try
        {
            $number_of_participants = User::has('recipes')->count();
            $number_of_recipes = Recipe::all()->count();
            $number_of_recipes_per_dulce_modality = Recipe::where('modality', 'Dulce')->count();
            $number_of_recipes_per_salado_modality = Recipe::where('modality', 'Salado')->count();

            return view('admin.reports.general', compact('number_of_participants',
                                                        'number_of_recipes',
                                                        'number_of_recipes_per_dulce_modality',
                                                        'number_of_recipes_per_salado_modality'));
        }
        catch(QueryException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
        catch(PDOException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
        catch(Exception $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
    }

    public function rankingByPhase($phase)
    {
        try
        {
            $ranking_by_phase = DB::select(DB::raw('SELECT recipes.id, recipes.name, SUM(votes.score) AS score, SUM(votes.factor) AS factor
                                                FROM votes, criteria, recipes
                                                WHERE votes.criterion_id =criteria.id
                                                AND votes.recipe_id = recipes.id
                                                AND criteria.phase=' . $phase .'
                                                GROUP BY recipes.id, recipes.name
                                                ORDER BY score DESC, factor DESC'));

            return view ('admin.reports.ranking_phase', compact('phase', 'ranking_by_phase'));
        }
        catch(QueryException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
        catch(PDOException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
        catch(Exception $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
    }

    public function classifieds($phase)
    {
        $limit = 20;
        if ($phase == 2)
        {
            $limit = 3;
        }
        try
        {
            $classifieds = DB::select(DB::raw('SELECT recipes.id, recipes.name, SUM(votes.score) AS score, SUM(votes.factor) AS factor
                                                FROM votes, criteria, recipes
                                                WHERE votes.criterion_id =criteria.id
                                                AND votes.recipe_id = recipes.id
                                                AND criteria.phase=' . $phase .'
                                                GROUP BY recipes.id, recipes.name                                     
                                                ORDER BY score DESC, factor DESC
                                                LIMIT ' . $limit));

            return view ('admin.reports.classifieds', compact('phase', 'classifieds'));
        }
        catch(QueryException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
        catch(PDOException $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
        catch(Exception $e)
        {
            flash('No pudo ser procesada la solicitud', 'danger');
            return redirect('admin');
        }
    }

    public function recipesPendingToVote()
    {
        if (Auth::user()->hasRole('super_admin'))
        {
            try
            {
                $recipes_not_voted = DB::select(DB::raw('SELECT CONCAT(users.name, " ", users.last_name) as judge, 
                                                      recipes.name as recipe
                                                      FROM users, recipes
                                                      WHERE recipes.id NOT IN (SELECT DISTINCT votes.recipe_id
                                                                              FROM votes)
                                                      ORDER BY judge, recipe'));

                return view ('admin.reports.recipes_not_voted', compact('recipes_not_voted'));
            }
            catch(QueryException $e)
            {
                flash('No pudo ser procesada la solicitud', 'danger');
                return redirect('admin');
            }
            catch(PDOException $e)
            {
                flash('No pudo ser procesada la solicitud', 'danger');
                return redirect('admin');
            }
            catch(Exception $e)
            {
                flash('No pudo ser procesada la solicitud', 'danger');
                return redirect('admin');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('admin');
    }

    public function recipesVoted()
    {
        if (Auth::user()->hasRole('super_admin'))
        {
            try
            {
                $recipes_voted = DB::select(DB::raw('SELECT DISTINCT concat(users.name, " ", users.last_name) as judge, 
                                                                      recipes.name as recipe
                                                      FROM users, recipes, votes
                                                      WHERE votes.recipe_id = recipes.id
                                                          AND votes.user_id = users.id
                                                      ORDER BY judge'));

                return view ('admin.reports.recipes_voted', compact('recipes_voted'));
            }
            catch(QueryException $e)
            {
                flash('No pudo ser procesada la solicitud', 'danger');
                return redirect('admin');
            }
            catch(PDOException $e)
            {
                flash('No pudo ser procesada la solicitud', 'danger');
                return redirect('admin');
            }
            catch(Exception $e)
            {
                flash('No pudo ser procesada la solicitud', 'danger');
                return redirect('admin');
            }
        }
        flash('No tiene permiso para realizar la operación', 'danger');
        return redirect('admin');
    }
}
