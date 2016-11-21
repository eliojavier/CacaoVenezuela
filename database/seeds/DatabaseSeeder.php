<?php

use App\Recipe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $tables = [
        'academies',
        'cities',
        'users',
        'judges',
        'ingredients',
        'recipes',
        'criteria',
        'ingredient_recipe',
        'sizes',
        'categories',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();
        $this->call(CitiesTableSeeder::class);
        $this->call(AcademiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(IngredientRecipeTableSeeder::class);

        factory('App\Judge', 5)->create();
        factory('App\User', 50)->create();
        factory('App\Recipe', 102)->create();
        factory('App\Criterion', 12)->create();
        factory('App\Vote', 12)->create();

        $faker = Faker\Factory::create();
        $recipes = Recipe::all();
        foreach ($recipes as $recipe){
            $recipe->ingredients()->attach([
                                            $faker->numberBetween($min = 1, $max = 161),
                                            $faker->numberBetween($min = 1, $max = 161),
                                            $faker->numberBetween($min = 1, $max = 161),
                                            $faker->numberBetween($min = 1, $max = 161),
                                            $faker->numberBetween($min = 1, $max = 161),
                                        ]);
        }
    }

    public function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->tables as $tableName) {
            DB::table($tableName)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
