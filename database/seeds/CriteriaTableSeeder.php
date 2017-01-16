<?php

use Illuminate\Database\Seeder;

class CriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criteria = [
            ['phase' => 1, 'criterion' => 'Creatividad/originalidad', 'priority'=>1],
            ['phase' => 1, 'criterion' => 'Calidad nutricional de los ingredientes', 'priority'=>2],
            ['phase' => 1, 'criterion' => 'Aprovechamiento de los ingredientes', 'priority'=>3],
            ['phase' => 1, 'criterion' => 'Versatilidad', 'priority'=>4],
            ['phase' => 1, 'criterion' => 'Costo de los ingredientes', 'priority'=>5],

            ['phase' => 2, 'criterion' => 'Técnicas', 'priority'=>1],
            ['phase' => 2, 'criterion' => 'Presentación', 'priority'=>2],
            ['phase' => 2, 'criterion' => 'Tiempo de elaboración', 'priority'=>3],
            ['phase' => 2, 'criterion' => 'Higiene', 'priority'=>4],
            ['phase' => 2, 'criterion' => 'Utilización del espacio físico', 'priority'=>5],
        ];

        DB::table('criteria')->insert($criteria);
    }
}
