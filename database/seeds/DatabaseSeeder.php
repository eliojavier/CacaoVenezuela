<?php

use App\Recipe;
use App\User;
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
        'roles',
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
        $this->call(CriteriaTableSeeder::class);

        factory('App\Judge', 5)->create();
        factory('App\User', 50)->create();
        factory('App\Recipe', 102)->create();
   
//        $this->IngredientRecipeTableSeeder();
        $this->VotesTableSeeder();
        $this->RoleUserTableSeeder();
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
    }

    public function VotesTableSeeder()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i<=100; $i++){
            $vote = new Vote(['score' => $faker->numberBetween($min = 0, $max = 10),
                'criterion_id' => $faker->numberBetween($min = 1, $max = 10),
                'user_id' => $faker->numberBetween($min = 4, $max = 8),
                'recipe_id' => $faker->numberBetween($min = 1, $max = 102),
                'factor' => $faker->randomNumber()
            ]);
            $vote->save();
        }
    }

    public function RoleUserTableSeeder()
    {
        //attach super admin role
        $user = User::findOrFail(1);
        $user->attachRole(1);

        //attach judge role
        $user = User::findOrFail(2);
        $user->attachRole(2);

        $user = User::findOrFail(3);
        $user->attachRole(2);

        //attach participant role
        $user = User::findOrFail(4);
        $user->attachRole(3);

        //attach participant role
        for ($i=5; $i<=51; $i++)
        {
            $user = User::findOrFail($i);
            $user->attachRole(3);
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
