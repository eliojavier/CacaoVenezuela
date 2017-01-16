<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\User;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function mostUsedIngredients()
    {
        $ingredients_most_used = DB::select(DB::raw('SELECT i.name as ingrediente, COUNT(i.id) AS usos
                                                    FROM ingredients i, ingredient_recipe ir
                                                    WHERE ir.ingredient_id = i.id
                                                    GROUP BY i.name, i.id
                                                    ORDER BY usos DESC '));

        return view('admin.reports.most_used_ingredients', compact('ingredients_most_used'));
    }

    public function numberOfParticipantsByCity()
    {
        $number_of_participants_by_city = DB::select(DB::raw('SELECT c.name AS ciudad, COUNT(c.id) AS participantes
                                                FROM cities c, users u 
                                                WHERE u.city_id = c.id
                                                GROUP BY c.name, c.id
                                                ORDER BY participantes DESC'));
        
        return view('admin.reports.participants_by_city', compact('number_of_participants_by_city'));
    }

    public function general()
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

    public function numberOfRecipesPerModality($modality)
    {
        $number_of_recipes_per_modality = Recipe::where('modality', $modality)->count();
        dd($number_of_recipes_per_modality);
    }

    public function rankingByPhase($phase)
    {
        $ranking_by_phase = DB::select(DB::raw('SELECT recipes.id, recipes.name, sum(votes.score) as score
                                                FROM votes, criteria, recipes
                                                WHERE votes.criterion_id =criteria.id
                                                AND votes.recipe_id = recipes.id
                                                AND criteria.phase=' . $phase . '
                                                GROUP BY recipes.id, recipes.name
                                                ORDER BY score DESC'));

        return view ('admin.reports.ranking_phase', compact('phase', 'ranking_by_phase'));
    }

    public function recipesPendingToVote()
    {
        $recipes_pending_to_vote = DB::select(DB::raw('SELECT CONCAT(users.name, " ", users.last_name) as judge, 
                                              recipes.name as recipe
                                              FROM users, recipes
                                              WHERE recipes.id NOT IN (SELECT DISTINCT votes.recipe_id
						                                              FROM votes)
                                              ORDER BY judge, recipe'));

    }

    public function recipesVoted()
    {
        $recipes_voted = DB::select(DB::raw('SELECT DISTINCT concat(users.name, " ", users.last_name) as judge, 
                                                              recipes.name as recipe
                                              FROM users, recipes, votes
                                              WHERE votes.recipe_id = recipes.id
	                                              AND votes.user_id = users.id
	                                          ORDER BY judge'));

        dd($recipes_voted);
    }
}
