<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(AcademiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(IngredientRecipeTableSeeder::class);

        factory('App\Judge', 5)->create();
        factory('App\User', 50)->create();
        factory('App\Recipe', 102)->create();
        factory('App\Criterion', 12)->create();
    }
}
