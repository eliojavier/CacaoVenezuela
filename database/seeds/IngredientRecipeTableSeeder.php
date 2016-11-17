<?php

use App\Recipe;
use Illuminate\Database\Seeder;

class IngredientRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipes = Recipe::all();

        foreach ($recipes as $recipe) {
            $recipe->ingredientes()->attach([1, 2, 3]);
        }
    }
}
