<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function ingredientsMostUsed()
    {
        $ingredients_most_used = DB::select(DB::raw('SELECT i.name, COUNT(i.id) AS usos
                                                    FROM ingredients i, ingredient_recipe ir
                                                    WHERE ir.ingredient_id = i.id
                                                    GROUP BY i.name, i.id
                                                    ORDER BY usos DESC '));
        
        dd($ingredients_most_used);
    }

    public function numberOfParticipantsByCity()
    {
        $number_of_participants_by_city = DB::select(DB::raw('SELECT c.name, COUNT(c.id) AS participantes
                                                FROM cities c, users u 
                                                WHERE u.city_id = c.id
                                                GROUP BY c.name, c.id
                                                ORDER BY participantes DESC'));

        dd($number_of_participants_by_city);
    }

    public function numberOfParticipants()
    {
        $number_of_participants = User::has('recipes')->count();
        dd($number_of_participants);
    }

    public function numberOfRecipes()
    {
        $number_of_recipes = Recipe::all()->count();
        dd($number_of_recipes);
    }

    public function numberOfRecipesByModality($modality)
    {
        $number_of_recipes_in_salado_modality = Recipe::where('modality', $modality)->count();
        dd($number_of_recipes_in_salado_modality);
    }
}
