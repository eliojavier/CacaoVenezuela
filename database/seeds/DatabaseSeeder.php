<?php

use App\Recipe;
use App\Vote;
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
        'votes',
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
        $this->call(RolesTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(IngredientRecipeTableSeeder::class);
        $this->call(CriteriaTableSeeder::class);

        factory('App\Judge', 5)->create();
        factory('App\User', 50)->create();
        factory('App\Recipe', 102)->create();
        //factory('App\Criterion', 12)->create();
        //factory('App\Vote', 12)->create();

        $this->IngredientRecipeTableSeeder();
        $this->VotesTableSeeder();
    }

    public function IngredientRecipeTableSeeder()
    {
        $faker = Faker\Factory::create();
        $recipes = Recipe::all();
        foreach ($recipes as $recipe){
            $recipe->ingredients()->attach($faker->numberBetween($min = 1, $max = 161), ['quantity' => $faker->numberBetween($min = 1, $max = 10) . ' ' . $faker->randomElement($array = array ('gramos', 'gr','kilos','cucharadas', 'pizca', 'gotas', 'un chorrito'))]);
            $recipe->ingredients()->attach($faker->numberBetween($min = 1, $max = 161), ['quantity' => $faker->numberBetween($min = 1, $max = 10) . ' ' . $faker->randomElement($array = array ('gramos', 'gr','kilos','cucharadas', 'pizca', 'gotas', 'un chorrito'))]);
            $recipe->ingredients()->attach($faker->numberBetween($min = 1, $max = 161), ['quantity' => $faker->numberBetween($min = 1, $max = 10) . ' ' . $faker->randomElement($array = array ('gramos', 'gr','kilos','cucharadas', 'pizca', 'gotas', 'un chorrito'))]);
            $recipe->ingredients()->attach($faker->numberBetween($min = 1, $max = 161), ['quantity' => $faker->numberBetween($min = 1, $max = 10) . ' ' . $faker->randomElement($array = array ('gramos', 'gr','kilos','cucharadas', 'pizca', 'gotas', 'un chorrito'))]);
            $recipe->ingredients()->attach($faker->numberBetween($min = 1, $max = 161), ['quantity' => $faker->numberBetween($min = 1, $max = 10) . ' ' . $faker->randomElement($array = array ('gramos', 'gr','kilos','cucharadas', 'pizca', 'gotas', 'un chorrito'))]);
        }

//        foreach ($recipes as $recipe){
//            $recipe->ingredients()->attach([
//                $faker->numberBetween($min = 1, $max = 161),
//                $faker->numberBetween($min = 1, $max = 161),
//                $faker->numberBetween($min = 1, $max = 161),
//                $faker->numberBetween($min = 1, $max = 161),
//                $faker->numberBetween($min = 1, $max = 161),
//            ], ['quantity' => $faker->numberBetween($min = 1, $max = 10)]);
//        }
    }

    public function VotesTableSeeder()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i<=100; $i++){
            $vote = new Vote(['score' => $faker->numberBetween($min = 0, $max = 10),
                'criterion_id' => $faker->numberBetween($min = 1, $max = 10),
                'judge_id' => $faker->numberBetween($min = 1, $max = 5),
                'recipe_id' => $faker->numberBetween($min = 1, $max = 102),
            ]);
            $vote->save();
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
