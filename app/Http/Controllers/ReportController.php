<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use App\User;
use Illuminate\Http\Request;
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

    public function totals()
    {
        $number_of_participants = User::has('recipes')->count();
        $number_of_recipes = Recipe::all()->count();
        $number_of_recipes_per_dulce_modality = Recipe::where('modality', 'Dulce')->count();
        $number_of_recipes_per_salado_modality = Recipe::where('modality', 'Salado')->count();

        return view('admin.reports.totals', compact('number_of_participants',
                                                    'number_of_recipes', 
                                                    'number_of_recipes_per_dulce_modality',
                                                    'number_of_recipes_per_salado_modality'));
    }

    public function numberOfRecipes()
    {
        $number_of_recipes = Recipe::all()->count();
        dd($number_of_recipes);
    }

    public function numberOfRecipesPerModality($modality)
    {
        $number_of_recipes_per_modality = Recipe::where('modality', $modality)->count();
        dd($number_of_recipes_per_modality);
    }

    public function rankingByPhase($phase)
    {
        $recipes = Recipe::has('votes')->count();
//        dd($recipes);
        $ranking_by_phase = DB::select(DB::raw('SELECT r.name, sum(v.score) as score
                                                FROM votes v, criteria c, recipes r 
                                                WHERE v.criterion_id =c.id
                                                AND v.recipe_id = r.id
                                                AND c.phase=' . $phase . '
                                                GROUP BY v.criterion_id, r.name, score
                                                ORDER BY v.score DESC'));
        dd($ranking_by_phase);
    }
}
